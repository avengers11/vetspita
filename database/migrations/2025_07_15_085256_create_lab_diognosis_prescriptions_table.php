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
        Schema::create('lab_diognosis_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('branche_id')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('prescription_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_number')->nullable();
            $table->string('address')->nullable();
            $table->string('pet_name')->nullable();
            $table->string('pet_species')->nullable();
            $table->string('pet_breed')->nullable();
            $table->string('pet_sex')->nullable();
            $table->string('pet_age')->nullable();
            $table->string('pet_weight')->nullable();
            $table->longText('prescription_content')->nullable();
            $table->longText('attachment')->nullable();
            $table->string("ref_dr")->nullable();
            $table->string('type')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_diognosis_prescriptions');
    }
};
