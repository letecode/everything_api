<?php

namespace App\Repositories\Eloquent;

use App\Models\ItemCategory;
use App\Repositories\ItemCategoryRepositoryInterface;

class ItemCategoryRepository implements ItemCategoryRepositoryInterface
{
    /**
     * The ItemCategory model.
     *
     * @var ItemCategory
     */
    protected $itemCategory;

    /**
     * ItemRepository constructor.
     *
     * @param ItemCategory|null $itemCategory
     */
    public function __construct(ItemCategory $itemCategory = null)
    {
        $this->itemCategory = $itemCategory ?? new ItemCategory();
    }

    /**
     * Retrieve a specified itemCategory from database by id.
     *
     * @param $id
     * @return ItemCategory
     */
    public function getById($id)
    {
        return $this->itemCategory->findOrFail($id);
    }

    /**
     * Retrieve all itemCategories from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->itemCategory->all();
    }

    /**
     * Get a list of itemCategories by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getWithPagination($n = 15)
    {
        return $this->itemCategory->paginate($n);
    }


    /**
     * Store a new itemCategory in the database.
     *
     * @param array $inputs
     * @return ItemCategory
     */
    public function createItem(array $inputs)
    {
        return $this->itemCategory->create($inputs);
    }

    /**
     * Update an itemCategory
     *
     * @return ItemCategory
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
     * Remove an ItemCategory from database.
     *
     * @return void
     */
    public function deleteItem($id)
    {
        $this->getById($id)->delete();
    }
}
