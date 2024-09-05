<?php

namespace App\Services;

use App\Models\Item;
use App\Repositories\ItemRepositoryInterface;

class ItemService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ItemRepositoryInterface $itemRepository
    )
    {}

    public function create(array $inputs) : Item
    {
        return $this->itemRepository->createItem($inputs);
    }

    public function update(array $inputs, $categoryId) : ?Item
    {
        return $this->itemRepository->updateItem($inputs, $categoryId);
    }

    public function delete($categoryId) : void
    {
        $this->itemRepository->deleteItem($categoryId);
    }
}
