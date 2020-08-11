<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\Profile;
use App\Models\Community;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\StoreProfile;
use App\Http\Requests\StoreCommunity;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Auth;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\Community\CommunityRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;

class CheatController extends Controller
{

    protected $notiRepo;
    protected $userRepo;
    protected $profileRepo;
    protected $communityRepo;
    protected $postRepo;
    protected $commRepo;

    public function __construct(
        NotificationRepositoryInterface $notiRepo,
        UserRepositoryInterface $userRepo,
        ProfileRepositoryInterface $profileRepo,
        CommunityRepositoryInterface $communityRepo,
        PostRepositoryInterface $postRepo,
        CommentRepositoryInterface $commRepo
    ) {
        $this->middleware('auth');
        $this->notiRepo = $notiRepo;
        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
        $this->communityRepo = $communityRepo;
        $this->postRepo = $postRepo;
        $this->commRepo = $commRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('CheatSheet.homepage', compact('notifications'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //****************************************************************For User ****************************************************************************/
    public function user()
    {

        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        $users = $this->userRepo->showall();

        return view('CheatSheet.User.homepage', compact('notifications', 'users'));
    }

    public function userupdate(StoreUser $request, $locale, $user)
    {
        $data = $request->validated();
        $user = $this->userRepo->showUser($user);
        $old_photo = $user->photo;

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension();
            $filename =   $user->name . '.' . $extension;

            $path = storage_path('app/public/' .  $user->name . '/');

            if (!file_exists($path . $filename)) {

                $file->move($path, $filename);
            } else if (!file_exists($path .  $old_photo)) {

                $file->banner->move($path, $filename);
            } else {

                unlink($path .  $old_photo);
                $file->banner->move($path, $filename);
            }
            $data['photo'] = $filename;
        }
        $user->photo = $data['photo'];
        $user->update($data);

        return redirect()->route('cheat.user', $locale);
    }

    public function userdestroy($locale, $user)
    {
        $this->userRepo->destroyUser($user);
        return redirect()->back();
    }

    public function userrestore($locale, $user)
    {
        $this->userRepo->restoreUser($user);
        return redirect()->back();
    }


    //****************************************************************For User ****************************************************************************/


    //****************************************************************For Profile ****************************************************************************/
    public function profile()
    {

        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);

        return view('CheatSheet.Profile.homepage', compact('notifications'));
    }

    public function profilestore(StoreProfile $request, $locale)
    {
        $data = $request->validated();

        $profile = new Profile();
        $profile->user_id = Auth::user()->id;
        $profile->save($data);

        return redirect()->back()->with('locale', $locale);
    }

    public function profileupdate(StoreProfile $request, $locale, $profile)
    {
        $data = $request->validated();

        $profile = $this->profileRepo->showProfile($profile);

        $profile->update($data);

        return redirect()->back()->with('locale', $locale);
    }


    //****************************************************************For Profile ****************************************************************************/


    //****************************************************************For Community ****************************************************************************/

    public function community()
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        $communities = $this->communityRepo->showall();
        return view('CheatSheet.Community.homepage', compact('notifications', 'communities'));
    }

    public function communitystore(StoreCommunity $request, $locale)
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
        return redirect()->route('cheat.community', $locale);
    }

    public function communityedit($locale, $community)
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        $community = $this->communityRepo->showcommunity($community);
        return view('CheatSheet.Community.edit', compact('notifications', 'community'))->with('locale', $locale);
    }

    public function communityupdate(StoreCommunity $request, $locale, $community)
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
        return redirect()->route('cheat.community', $locale);
    }

    public function communitydestroy($locale, $community)
    {

        $this->communityRepo->deletecommunity($community);
        return redirect()->back();
    }

    public function communityrestore($locale, $community)
    {
        $this->communityRepo->restorecommunity($community);

        return redirect()->back();
    }
    //****************************************************************For Community ****************************************************************************/

    //****************************************************************For Post ****************************************************************************/

    public function post()
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        $posts = $this->postRepo->showall();
        $communities = $this->communityRepo->showall();
        return view('CheatSheet.Post.homepage', compact('notifications', 'posts', 'communities'));
    }

    public function poststore(StorePost $request, $locale)
    {

        $data = $request->validated();

        $post = new Post();

        $post->title = $data['title'];
        $post->detail = $data['detail'];
        $post->user_id =  $data['user_id'];
        $post->community_id =  $data['community_id'];

        if ($request->hasFile('image')) {

            $extension = $data['image']->getClientOriginalExtension();
            $filename = $data['title'] . '.' . $extension;
            $path = storage_path('app/public/post/' . $data['title'] . '/');

            $data['image']->move($path, $filename);
            $data['image'] = $filename;
            $post->image = $data['image'];
            $post->save();
            return redirect()->back();
        } else {

            $post->save();
            return redirect()->back();
        }
    }

    public function postedit($locale, $post)
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);

        $post = $this->postRepo->showpost($post);
        return view('CheatSheet.Post.edit', compact('notifications', 'post'))->with('locale', $locale);
    }

    public function postupdate(StorePost $request, $locale, $post)
    {
        $data = $request->validated();

        $post = $this->postRepo->showpost($post);

        $old_image = $post->image;
        $old_title = $post->title;

        $post->title = $data['title'];
        $post->detail = $data['detail'];
        $post->user_id =  $data['user_id'];
        $post->community_id =  $data['community_id'];

        if ($request->hasFile('image')) {

            $extension = $data['image']->getClientOriginalExtension();
            $filename = $data['title'] . '.' . $extension;
            $path = storage_path('app/public/post/' . $data['title'] . '/');
            $oldpath = storage_path('app/public/post/' .  $old_title . '/');
            if (!file_exists($path . $filename)) {

                $data['image']->move($path, $filename);
            } elseif (!file_exists($path . $old_image)) {

                $data['image']->move($path, $filename);
                unlink($path . $old_image);
            } else {
                unlink($oldpath . $old_image);
                $data['image']->move($path, $filename);
            }
            $data['image'] = $filename;
            $post->image = $data['image'];
            $post->update();
            return redirect()->route('cheat.post', $locale);
        } else {

            $post->update();
            return redirect()->route('cheat.post', $locale);
        }
    }

    public function postdestroy($locale, $post)
    {
        $this->postRepo->deletepost($post);
        return redirect()->back();
    }

    public function postrestore($locale, $post)
    {
        $this->postRepo->restorepost($post);
        return redirect()->back();
    }
    //****************************************************************For Post ****************************************************************************/

    //****************************************************************For Comment ****************************************************************************/

    public function comment()
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        $comments = $this->commRepo->showall();
        $posts = $this->postRepo->showall();
        return view('CheatSheet.Comment.homepage', compact('notifications', 'comments','posts'));
    }

    public function commentstore(StoreComment $request, $locale)
    {

        $data = $request->validated();

        $post = $this->postRepo->showpost($data['post_id']);

        if ($request->hasFile('comment_image')) {

            $data['comment_image'] = $request->file('comment_image');

            $extension = $data['comment_image']->getClientOriginalExtension();
            $filename =  Auth::user()->name . '.' . $extension;
            $path = storage_path('app/public/comment/post/' . $data['comment_detail'] . '/');

            $data['comment_image']->move($path, $filename);
            $data['comment_image'] = $filename;

            $post->comment()->create([
                'comment_detail' => $data['comment_detail'],
                'comment_image' =>  $data['comment_image'],
                'user_id' => $data['user_id'],
            ]);

            return redirect()->back();
        } else {
            $post->comment()->create([
                'comment_detail' => $data['comment_detail'],
                'user_id' => $data['user_id'],
            ]);

            return redirect()->back();
        }
    }

    public function commentedit($locale, $comment)
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);

        $comment = $this->commRepo->showComment($comment);
        return view('CheatSheet.Comment.edit', compact('notifications', 'comment'))->with('locale', $locale);
    }

    public function commentupdate(StoreComment $request, $locale, $comment)
    {
        $data = $request->validated();

        $post = $this->commRepo->showComment($comment);

        $old_image = $post->image;
        $old_title = $post->title;

        $post->title = $data['title'];
        $post->detail = $data['detail'];
        $post->user_id =  $data['user_id'];
        $post->community_id =  $data['community_id'];

        if ($request->hasFile('image')) {

            $extension = $data['image']->getClientOriginalExtension();
            $filename = $data['title'] . '.' . $extension;
            $path = storage_path('app/public/post/' . $data['title'] . '/');
            $oldpath = storage_path('app/public/post/' .  $old_title . '/');
            if (!file_exists($path . $filename)) {

                $data['image']->move($path, $filename);
            } elseif (!file_exists($path . $old_image)) {

                $data['image']->move($path, $filename);
                unlink($path . $old_image);
            } else {
                unlink($oldpath . $old_image);
                $data['image']->move($path, $filename);
            }
            $data['image'] = $filename;
            $post->image = $data['image'];
            $post->update();
            return redirect()->route('cheat.post', $locale);
        } else {

            $post->update();
            return redirect()->route('cheat.post', $locale);
        }
    }

    public function commentdestroy($locale, $post)
    {
        $this->postRepo->deletepost($post);
        return redirect()->back();
    }

    public function commentrestore($locale, $post)
    {
        $this->postRepo->restorepost($post);
        return redirect()->back();
    }

    //****************************************************************For Comment ****************************************************************************/
}
