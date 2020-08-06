<?php

namespace App\Repositories\Community;

use App\Repositories\BaseRepository;
use App\Models\Community;
use Illuminate\Support\Facades\DB;

class CommunityRepository extends BaseRepository implements CommunityRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Community::class;
    }

    public function showall()
    { 
        
        return $this->model->withTrashed()->get();
    }

    public function showcommunity($id)
    {
        return $this->model->findOrFail($id);
    }
   
    public function deletecommunity($id)
    {      
        $community = $this->model->findOrFail($id);
        
        return $community->delete();
    }

    public function restorecommunity($id)
    {
        return $this->model->onlyTrashed()->where('id',$id)->restore();   
    }

    public function getTrash($id)
    {  
        return $this->model->withTrashed()->find($id);
    }

}
