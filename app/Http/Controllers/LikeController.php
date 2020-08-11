<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;

class LikeController extends Controller
{

    protected $postRepo;
    protected $commRepo;

    public function __construct(PostRepositoryInterface $postRepo,CommentRepositoryInterface $commRepo)
    {
        $this->middleware('auth');
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
        //
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

    public function like($locale,$postid)
    {
        $post = $this->postRepo->showpost($postid);

        $post->likes()->create([
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function unlike($locale,$postid)
    {
        $post = $this->postRepo->showpost($postid);

        $post->likes()->delete();

        return redirect()->back();
    }

    public function likeComment($locale,$commentid)
    {
        $comment = $this->commRepo->showComment($commentid);
        dd($comment);
        $comment->likes()->create([
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function unlikeComment($locale,$commentid)
    {
        $comment = $this->commRepo->showComment($commentid);

        $comment->likes()->delete();

        return redirect()->back();
    }
}
