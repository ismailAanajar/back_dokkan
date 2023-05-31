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
        Schema::create('text_images', function (Blueprint $table) {
            $table->id();
            $table->enum('name', ['text_image'])->default('text_image');
            $table->string('title');
            $table->string('sub_title');
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
        Schema::dropIfExists('text_images');
    }
};