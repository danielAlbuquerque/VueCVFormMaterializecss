<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rg', 10)->index();
            $table->string('cpf', 18)->index();
            $table->string('nome_completo');
            $table->date('dt_nascimento');
            $table->string('email');
            $table->string('cel1');
            $table->string('cel2')->nullable();
            $table->string('endereco');
            $table->string('bairro');
            $table->string('nivel_escolaridade');
            $table->string('cv')->nullable();
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
        Schema::dropIfExists('curriculos');
    }
}
