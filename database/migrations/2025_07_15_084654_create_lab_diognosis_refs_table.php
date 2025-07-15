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
        Schema::create('lab_diognosis_refs', function (Blueprint $table) {
            $table->id();
            $table->string("category")->nullable();
            $table->string("parameter")->nullable();
            $table->string("abbreviation")->nullable();
            $table->string("canine_ref_range", 50)->nullable();
            $table->string("feline_ref_range", 50)->nullable();
            $table->string("units")->nullable();
            $table->integer("order")->nullable();
            $table->string("type", 60)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_diognosis_refs');
    }
};
