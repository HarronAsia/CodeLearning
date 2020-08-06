<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\StoreCommunity;
use App\Repositories\Community\CommunityRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;

class CommunityController extends Controller
{

    protected $communityRepo;
    protected $postRepo;

    public function __construct(CommunityRepositoryInterface $communityRepo, PostRepositoryInterface $postRepo)
    {
        $this->communityRepo = $communityRepo;
        $this->postRepo = $postRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = $this->communityRepo->showall();
        return view('Community.community_list', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Community.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunity $request)
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
        return redirect()->route('community.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale,$community)
    {
        $community = $this->communityRepo->showcommunity($community);
        $posts = $this->postRepo->showall($community->id);
        
        return view('Community.homepage', compact('community','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale,$community)
    {
        $community = $this->communityRepo->showcommunity($community);
        
        return view('Community.edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommunity $request)
    {
        $data = $request->validated();

        $community = $this->communityRepo->showcommunity($request['id']);

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
        return redirect()->route('community.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale,$community)
    {
        
        $this->communityRepo->deletecommunity($community);
        return redirect()->back();
        
    }

    public function restore($locale,$community)
    {
        $this->communityRepo->restorecommunity($community);

        return redirect()->back();
    }
}
