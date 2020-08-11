<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    public function showall()
    {
        return $this->model = Post::with('comments','likes','like')->withTrashed()->CreatedAt()->get();
    }

    public function showallonCommunity($id)
    {
        
        return $this->model = Post::with('comments','likes','like')->withTrashed()->ofCommunity($id)->get();   
  
    }

    public function showpost($id)
    {
        return $this->model = Post::findOrFail($id);
    }

    public function deletepost($id)
    {
        
        $this->model = Post::findOrFail($id);
        
        return $this->model->delete();
    }

    public function restorepost($id)
    {
       
        return $this->model = Post::onlyTrashed()->ofId($id)->restore();      
        
    }
    public function getTrash($id)
    {
        
        return $this->model = Post::withTrashed()->find($id);
    }

}
