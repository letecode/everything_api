<?php

namespace App\Repositories;

interface ItemCategoryRepositoryInterface
{
    public function getById($itemId);
    public function getAll();
    public function getWithPagination($n);
    public function create(array $inputs);
    public function update(array $inputs, $itemId);
    public function delete($itemId);
}
