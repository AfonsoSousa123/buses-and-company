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
            $table->increments('id');

            $table->integer('user_id');

            $table->string('Matricula')->unique();
            
            $table->string('Marca');

            $table->year('Ano_Producao')->nullable();

            $table->string('Empresa')->nullable();

            $table->string('Modelo')->nullable();

            $table->longtext('Imagem')->nullable();

            $table->string('Motor')->nullable();

            $table->integer('Num_Motor')->nullable();

            $table->string('Combustivel')->nullable();

            $table->string('Carrocaria')->nullable();
            
            $table->integer('Num_Chassis')->nullable();
            
            $table->string('Lotacao')->nullable();
            
            $table->string('Comprimento')->nullable();

            $table->string('Largura')->nullable();

            $table->string('Altura')->nullable();

            $table->string('Dist_entre_eixos')->nullable();

            $table->string('Peso_bruto')->nullable();

            $table->text('Descricao')->nullable();

            $table->timestamps();
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
