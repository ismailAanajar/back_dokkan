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
        Schema::create('link_images', function (Blueprint $table) {
            $table->id();
            $table->enum('name', ['link_image'])->default('link_image');
            $table->string('link');
            $table->string('image');
            $table->integer('width');
            $table->json('style')->nullable();
            $table->string('page');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_images');
    }
};