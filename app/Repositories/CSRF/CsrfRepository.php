<?php

namespace App\Repositories\CSRF;

use App\Repositories\BaseRepository;


class CsrfRepository extends BaseRepository implements CsrfRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\CSRF::class;
    }

    public function showAll()
    {
        return $this->model::orderBy('created_at','desc')->get();
    }
}
