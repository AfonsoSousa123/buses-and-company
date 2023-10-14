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
        Schema::create('comment_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->foreign('image_id')->references('id')->on('media');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commnent_image');
    }
};
