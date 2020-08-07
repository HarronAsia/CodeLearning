<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreComment;

use App\Notifications\AddCommentNotification;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

class CommentController extends Controller
{
    protected $postRepo;
    protected $commRepo;
    protected $threadRepo;
    protected $profileRepo;
    protected $notiRepo;

    public function __construct(
        PostRepositoryInterface $postRepo,
        CommentRepositoryInterface $commRepo,
        NotificationRepositoryInterface $notiRepo
    ) {
        $this->middleware('auth');
        $this->postRepo = $postRepo;
        $this->commRepo = $commRepo;
        $this->notiRepo = $notiRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request, $locale, $post)
    {
        $data = $request->validated();

        $post = $this->postRepo->showpost($post);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $comment)
    {
        $comment = $this->commRepo->showComment($comment);
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('Comment.edit', compact('comment','notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreComment $request, $locale, $commentid)
    {

        $data = $request->validated();

        $comment = $this->commRepo->showComment($commentid);
        $comment->comment_detail = $data['comment_detail'];
        $comment->user_id = Auth::user()->id;
        $old_image = $comment->comment_image;

        if ($request->hasFile('comment_image')) {

            $comment->comment_image =  $data['comment_image'];

            $extension =  $comment->comment_image->getClientOriginalExtension();


            $filename =  Auth::user()->name . '.' . $extension;

            $path = storage_path('app/public/comment/post/' . $data['comment_detail'] . '/');

            if (!file_exists($path . $filename)) {

                $comment->comment_image->move($path, $filename);
            } else if (!file_exists($path . $old_image)) {

                $comment->comment_image->move($path, $filename);
            } else {

                unlink($path . $old_image);
                $comment->comment_image->move($path, $filename);
            }
            $comment->comment_image = $filename;
            $comment->comment_detail = $data['comment_detail'];
            $comment->user_id = Auth::user()->id;

            $comment->update();

            return redirect()->back();
        } else {

            $comment->update();

            //dd( $comment);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $commentid)
    {

        $this->commRepo->deletecomment($commentid);
        return redirect()->back();
    }

    public function restore($locale, $commentid)
    {

        $this->commRepo->restorecomment($commentid);
        return redirect()->back();
    }
}
