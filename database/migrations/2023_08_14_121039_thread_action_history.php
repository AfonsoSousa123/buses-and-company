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
        Schema::create('thread_action_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thread_id')->nullable();
            $table->unsignedBigInteger('action_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('thread_id')->references('id')->on('threads');
            $table->foreign('action_id')->references('id')->on('actions');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
