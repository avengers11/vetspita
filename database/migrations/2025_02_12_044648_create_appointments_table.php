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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string("parent_name")->nullable();
            $table->string("parent_number")->nullable();
            $table->string("parent_email")->nullable();
            $table->text("parent_address")->nullable();

            $table->string("patient_name")->nullable();
            $table->string("patient_species")->nullable();
            $table->string("patient_age")->nullable();
            $table->string("patient_breed")->nullable();
            $table->string("patient_gender")->nullable();
            $table->text("purpose")->nullable();
            $table->string("date_time")->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
