<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Repositories\Post\PostRepositoryInterface;

class PostController extends Controller
{
    protected $postRepo;
    public function __construct(PostRepositoryInterface $postRepo)
    {
        $this->middleware('auth');
        $this->postRepo = $postRepo;
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
    public function store(StorePost $request)
    {
        
        if ($request->has('post_form')) {
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
    public function edit($post)
    {
        $post = $this->postRepo->showpost($post);
        return view('Post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $post)
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
            return redirect()->route('community.show', $post->community_id);
        } else {

            $post->update();
            return redirect()->route('community.show', $post->community_id);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $this->postRepo->deletepost($post);
        return redirect()->back();
    }

    public function restore($post)
    {
        $this->postRepo->restorepost($post);
        return redirect()->back();
    }
}
