<?php

namespace App\Repositories;

use App\Models\Like;

interface LikeRepositoryInterface
{
    public function likeItem(array $inputs) : Like;
    public function unlikeItem(array $inputs): void;
}
