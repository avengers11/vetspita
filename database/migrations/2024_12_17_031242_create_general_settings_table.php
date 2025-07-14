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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            
            $table->string('key')->nullable();
            $table->longText('value')->nullable();

            // $table->string('favicon')->nullable();
            // $table->string('title')->nullable();
            // $table->string('meta_description')->nullable();

            // // Why Choose Us
            // $table->integer('choose_us_consultation')->nullable();
            // $table->integer('choose_us_surgery')->nullable();
            // $table->integer('choose_us_online_consultation')->nullable();
            // $table->integer('choose_us_diagnostic')->nullable();

            // // Company details
            // $table->string('company_description')->nullable();
            // $table->string('company_number')->nullable();
            // $table->string('company_email')->nullable();
            // $table->json('company_social_media')->nullable();

            // // about 
            // $table->json('about_title')->nullable();
            // $table->json('about_cover')->nullable();
            // $table->longText('about_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
