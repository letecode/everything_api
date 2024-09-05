<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->foreignUuid('item_category_id')->nullable();
            $table->string('name');
            $table->string('summary')->nullable();
            $table->text('description')->nullable();
            $table->string('cover')->nullable(); // principal image
            $table->text('images')->nullable(); // multiple images
            $table->float('price')->nullable();
            $table->string('currency')->nullable(); // USD, CDF, ....
            $table->string('address')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('color', 7)->nullable(); // #FFFFFF, #000000
            $table->boolean('is_published')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
