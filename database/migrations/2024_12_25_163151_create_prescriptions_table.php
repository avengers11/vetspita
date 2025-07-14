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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('branche_id')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('prescription_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_number')->nullable();
            $table->string('pet_name')->nullable();
            $table->string('pet_species')->nullable();
            $table->string('pet_breed')->nullable();
            $table->string('pet_sex')->nullable();
            $table->string('pet_age')->nullable();
            $table->string('pet_weight')->nullable();
            $table->boolean('vaccinated')->nullable();
            $table->string('vaccinated_date')->nullable();
            $table->longText('medicine_history')->nullable();
            $table->string('date')->nullable();
            $table->text('clinical_history')->nullable();
            $table->text('clinical_findings')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('advice')->nullable();
            $table->string('type')->default('normal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
