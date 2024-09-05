<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    /**
     * Get the itemCategory that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemCategory(): BelongsTo
    {
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }
}
