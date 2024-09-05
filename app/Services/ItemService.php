<?php

namespace App\Services;

use App\Models\Item;
use App\Repositories\ItemRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ItemService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ItemRepositoryInterface $itemRepository
    )
    {}

    public function getById(string $itemId): Item
    {
        return $this->itemRepository->getById($itemId);
    }

    public function getAll() : Collection
    {
        return $this->itemRepository->getAll();
    }

    public function create(array $inputs) : Item
    {
        return $this->itemRepository->createItem($inputs);
    }

    public function update(array $inputs, $itemId) : ?Item
    {
        return $this->itemRepository->updateItem($inputs, $itemId);
    }

    public function delete($itemId) : void
    {
        $this->itemRepository->deleteItem($itemId);
    }
}
