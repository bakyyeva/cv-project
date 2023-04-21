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
        Schema::create('portfolio_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('portfolio_id');
            $table->string('image');
            $table->boolean('feature_status');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('portfolio_id')->on('portfolios')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_images');
    }
};
