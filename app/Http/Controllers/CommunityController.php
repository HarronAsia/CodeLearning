<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Community;
use App\Http\Requests\StoreCommunity;
use App\Repositories\Community\CommunityRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Follower\FollowerRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

class CommunityController extends Controller
{

    protected $communityRepo;
    protected $postRepo;
    protected $followRepo;
    protected $notiRepo;
    public function __construct(CommunityRepositoryInterface $communityRepo, PostRepositoryInterface $postRepo, FollowerRepositoryInterface $followRepo, NotificationRepositoryInterface $notiRepo)
    {
        $this->communityRepo = $communityRepo;
        $this->postRepo = $postRepo;
        $this->followRepo = $followRepo;
        $this->notiRepo = $notiRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
        $communities = $this->communityRepo->showall();
        $posts = $this->postRepo->showall();
        if (Auth::guest()) {
            return view('Community.community_list', compact('communities', 'posts'))->with('locale', $locale);
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('Community.community_list', compact('communities', 'posts', 'notifications'))->with('locale', $locale);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('Community.add', compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunity $request, $locale)
    {
        $data = $request->validated();

        $community = new Community;

        $community->title = $data['title'];
        if ($request->hasFile('banner')) {

            $community->banner = $request->file('banner');

            $extension = $community->banner->getClientOriginalExtension();
            $filename = $data['title'] . '.' . $extension;
            $path = storage_path('app/public/community/' . $data['title'] . '/');

            $community->banner->move($path, $filename);
        }
        $data['banner'] = $filename;

        $community->banner = $data['banner'];
        $community->save();
        return redirect()->route('community.index', ['locale' => $locale]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $community)
    {

        $community = $this->communityRepo->showcommunity($community);
        $posts = $this->postRepo->showallonCommunity($community->id);
        
        $followers = $this->followRepo->showfollowers($community->id);

        if(Auth::guest())
        {
            return view('Community.homepage', compact('locale', 'community', 'posts', 'followers'));
        }
        else
        {
            $follower = $this->followRepo->showfollowerCommunity(Auth::user()->id, $community->id);
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('Community.homepage', compact('locale', 'community', 'posts', 'follower', 'followers', 'notifications'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $community)
    {
        $community = $this->communityRepo->showcommunity($community);
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('Community.edit', compact('community', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommunity $request, $locale, $community)
    {
        $data = $request->validated();

        $community = $this->communityRepo->showcommunity($community);

        $community->title = $data['title'];

        $old_banner = $community->banner;

        if ($request->hasFile('banner')) {

            $community->banner =  $data['banner'];

            $extension =  $community->banner->getClientOriginalExtension();


            $filename =  $data['title'] . '.' . $extension;

            $path = storage_path('app/public/community/' . $data['title'] . '/');

            if (!file_exists($path . $filename)) {

                $community->banner->move($path, $filename);
            } else if (!file_exists($path . $old_banner)) {

                $community->banner->move($path, $filename);
            } else {

                unlink($path . $old_banner);
                $community->banner->move($path, $filename);
            }
        }
        $community->banner = $filename;
        $community->update();
        return redirect()->route('community.index', ['locale' => $locale]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $community)
    {

        $this->communityRepo->deletecommunity($community);
        return redirect()->back();
    }

    public function restore($locale, $community)
    {
        $this->communityRepo->restorecommunity($community);

        return redirect()->back();
    }
}
