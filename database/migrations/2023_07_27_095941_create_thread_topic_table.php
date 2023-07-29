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
        Schema::create('thread_topic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thread_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thread_topic');
    }
};
