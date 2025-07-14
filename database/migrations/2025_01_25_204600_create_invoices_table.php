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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string("unique_id")->nullable();
            $table->integer("patient_id")->nullable();
            $table->string("patient_name")->nullable();
            $table->string("parents_name")->nullable();
            $table->string("user_number")->nullable();
            $table->string("address")->nullable();
            $table->string("date")->nullable();
            $table->longText("items_arry")->nullable();
            $table->string("cart_subtotal")->nullable();
            $table->string("cart_discount")->nullable();
            $table->string("cart_total")->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
