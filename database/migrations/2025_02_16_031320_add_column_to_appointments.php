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
        Schema::table('appointments', function (Blueprint $table) {
            $table->string("patient_id")->nullable();
            $table->string("doctor_id")->nullable();

            $table->dropColumn("parent_name");
            $table->dropColumn("parent_number");
            $table->dropColumn("parent_email");
            $table->dropColumn("parent_address");
            $table->dropColumn("patient_name");
            $table->dropColumn("patient_age");
            $table->dropColumn("patient_breed");
            $table->dropColumn("patient_gender");
            $table->dropColumn("patient_species");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn("patient_id");
            $table->dropColumn("doctor_id");

            $table->string("parent_name")->nullable();
            $table->string("parent_number")->nullable();
            $table->string("parent_email")->nullable();
            $table->string("parent_address")->nullable();
            $table->string("patient_name")->nullable();
            $table->string("patient_age")->nullable();
            $table->string("patient_breed")->nullable();
            $table->string("patient_gender")->nullable();
            $table->string("patient_species")->nullable();
        });
    }
};
