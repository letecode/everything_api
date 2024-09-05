<?php

namespace App\Repositories;

interface ItemRepositoryInterface
{
    public function getById($itemId);
    public function getAll();
    public function getWithPagination($n);
    public function createItem(array $inputs);
    public function updateItem(array $inputs, $itemId);
    public function deleteItem($itemId);
}
