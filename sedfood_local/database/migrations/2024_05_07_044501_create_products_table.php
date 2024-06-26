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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('image');
            $table->integer('quantity')->default(0);
            $table->foreignId('category_id')->constrained();
            $table->decimal('price',10,2);
            $table->decimal('discount_price',10,2);
            $table->tinyInteger('hot')->default(0);
            $table->integer('view');
            $table->tinyInteger('outstanding')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('slug');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};