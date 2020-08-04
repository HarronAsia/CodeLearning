<?php
namespace App\Repositories\Profile;

interface ProfileRepositoryInterface
{
    public function getProfile($id);

    public function showProfile($id);
}