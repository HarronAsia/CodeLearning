<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function showAll();
    public function showUser($id);
    public function destroyUser($id);
    public function restoreUser($id);
}