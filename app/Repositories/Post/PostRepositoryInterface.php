<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function showall();
    public function showallonCommunity($id);
    public function showpost($id);

    public function deletepost($id);
    public function restorepost($id);

    public function getTrash($id);
}
