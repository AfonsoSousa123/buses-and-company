<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable()->unique();
            $table->integer('user_id');
            $table->string('licence_plate')->unique();
            $table->string('brand');
            $table->date('prod_year')->nullable();
            $table->string('enterprise')->nullable();
            $table->string('model')->nullable();
            $table->string('engine')->nullable();
            $table->string('engine_num')->nullable();
            $table->string('fuel')->nullable();
            $table->string('chassis')->nullable();
            $table->string('chassis_num')->nullable();
            $table->string('capacity')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('length_btw_axis')->nullable();
            $table->string('weight')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
