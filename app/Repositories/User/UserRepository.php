<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function showAll()
    {

        return $this->model = User::withTrashed()->paginate(10);
    }

    public function showUser($id)
    {

        return $this->model = User::findOrFail($id);
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        return $this->model = $user->delete();
    }

    public function restoreUser($id)
    {
        $user = User::withTrashed()->findorFail($id);
        return $this->model = $user->restore();
    }
    
}
