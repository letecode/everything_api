<?php

namespace App\Services;

use App\Models\ItemCategory;
use App\Repositories\ItemCategoryRepositoryInterface;

class ItemCategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ItemCategoryRepositoryInterface $itemCategoryRepository
    )
    {}

    public function create(array $inputs) : ItemCategory
    {
        return $this->itemCategoryRepository->create($inputs);
    }

    public function update(array $inputs, $categoryId) : ?ItemCategory
    {
        return $this->itemCategoryRepository->update($inputs, $categoryId);
    }

    public function delete($categoryId) : void
    {
        $this->itemCategoryRepository->delete($categoryId);
    }
}
