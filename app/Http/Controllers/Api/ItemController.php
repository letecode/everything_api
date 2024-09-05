<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Services\ItemService;
use Illuminate\Http\JsonResponse;

class ItemController extends BaseController
{
    public function __construct(
        protected ItemService $itemService
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $items = $this->itemService->getAll();
        return $this->sendResponse(ItemResource::collection($items));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $inputs = $request->validated();
        $item = $this->itemService->create($inputs);
        return $this->sendResponse(new ItemResource($item));
    }

    /**
     * Display the specified resource.
     */
    public function show(String $itemId)
    {
        $item = $this->itemService->getById($itemId);
        if($item == null) {
            return $this->sendError('Item not found');
        }

        return $this->sendResponse(new ItemResource($item));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, string $itemId)
    {
        $item = $this->itemService->getById($itemId);
        if($item == null) {
            return $this->sendError('Item not found');
        }

        $newItem = $this->itemService->update($request->validated(), $item->id);
        return $this->sendResponse(new ItemResource($newItem));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $itemId)
    {
        $item = $this->itemService->getById($itemId);
        if($item == null) {
            return $this->sendError('Item not found');
        }

        $this->itemService->delete($item->id);
        return $this->sendResponse(true, "Item deleted successfully");
    }
}
