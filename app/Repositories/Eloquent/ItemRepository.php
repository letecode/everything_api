<?php

namespace App\Repositories\Eloquent;

use App\Models\Item;
use App\Repositories\ItemRepositoryInterface;

class ItemRepository implements ItemRepositoryInterface
{
    /**
     * The Item model.
     *
     * @var Item
     */
    protected $item;

    /**
     * ItemRepository constructor.
     *
     * @param Item|null $item
     */
    public function __construct(Item $item = null)
    {
        $this->item = $item ?? new Item();
    }

    /**
     * Retrieve a specified item from database by id.
     *
     * @param $id
     * @return Item
     */
    public function getById($id)
    {
        return $this->item->findOrFail($id);
    }

    /**
     * Retrieve all items from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->item->all();
    }

    /**
     * Get a list of items by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getWithPagination($n = 15)
    {
        return $this->item->paginate($n);
    }


    /**
     * Store a new item in the database.
     *
     * @param array $inputs
     * @return Item
     */
    public function createItem(array $inputs)
    {
        return $this->item->create($inputs);
    }

    /**
     * Update an item
     *
     * @return Item
     */
    public function updateItem(array $inputs, $id)
    {
        $instance = $this->getById($id);
        foreach($inputs as $property => $value)
            $instance->$property = $value;
        $instance->save();
        return $this->getById($id);
    }

    /**
     * Remove an item from database.
     *
     * @return void
     */
    public function deleteItem($id)
    {
        $this->getById($id)->delete();
    }

}
