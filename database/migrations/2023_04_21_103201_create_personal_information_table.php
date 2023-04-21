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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('image');
            $table->string('profession');
            $table->date('birthday');
            $table->string('website');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('cv');
            $table->mediumText('languages');
            $table->mediumText('interests');
            $table->string('main_title');
            $table->text('about');
            $table->string('btn_contact_text');
            $table->string('btn_contact_link');
            $table->string('sub_title_left');
            $table->string('small_title_left');
            $table->string('sub_title_right');
            $table->string('small_title_right');
            $table->string('sub_title_bottom');
            $table->string('small_title_bottom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
