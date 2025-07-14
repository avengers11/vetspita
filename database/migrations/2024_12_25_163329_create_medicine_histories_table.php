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
        Schema::create('medicine_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('medicine_id')->nullable();
            $table->integer('prescription_id')->nullable();
            $table->text('sig_details')->nullable();
            $table->string('sig_ml')->nullable();
            $table->string('sig_time')->nullable();
            $table->string('sig_frequency')->nullable();
            $table->string('sig_position')->nullable();
            $table->string('sig_day')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_histories');
    }
};
