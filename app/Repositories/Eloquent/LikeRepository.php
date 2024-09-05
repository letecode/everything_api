<?php

namespace App\Repositories\Eloquent;

use App\Models\Like;
use App\Repositories\LikeRepositoryInterface;

class LikeRepository implements LikeRepositoryInterface
{
     /**
     * The Like model.
     *
     * @var Like
     */
    protected $like;

    /**
     * LikeRepository constructor.
     *
     * @param Like|null $like
     */
    public function __construct(Like $item = null)
    {
        $this->like = $like ?? new Like();
    }

    /**
     * Like a specified item from database by id.
     *
     * @param $inputs
     * @return Like
     */
    public function likeItem(array $inputs): Like
    {
        return $this->like->firstOrCreate($inputs);
    }

    /**
    * delete a specified like from database by id.
    *
    * @param $inputs
    * @return void
    */
    public function unlikeItem(array $inputs): void
    {
        $like = $this->like->where('user_id', $inputs['user_id'])
                            ->where('item_id', $inputs['item_id'])
                            ->first();
        if($like != null) {
            $like->delete();
        }
    }
}
