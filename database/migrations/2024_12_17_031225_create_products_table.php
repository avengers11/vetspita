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
            $table->integer('package_id')->nullable();
            $table->integer('plan_id')->nullable();
            $table->integer('product_category_id')->nullable();
            $table->string('image')->nullable();
            $table->text('title')->nullable();
            $table->longText('short_description')->nullable();
            $table->text('stock')->nullable();
            $table->text('sku')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->json('details_table')->nullable();
            $table->longText('details')->nullable();
            $table->longText('eligibility')->nullable();
            $table->longText('more_details')->nullable();
            $table->text('is_featured')->nullable();
            $table->text('status')->nullable();
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
