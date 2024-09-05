<?php

namespace App\Services;

use App\Models\Like;
use App\Repositories\LikeRepositoryInterface;

class LikeService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected LikeRepositoryInterface $likeRepository
    )
    {}

    public function like(array $inputs) : Like
    {
        return $this->likeRepository->likeItem($inputs);
    }

    public function unlike(array $inputs) : void
    {
        $this->likeRepository->unlikeItem($inputs);
    }


}
