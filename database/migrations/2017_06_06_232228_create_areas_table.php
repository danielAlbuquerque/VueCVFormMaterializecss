<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('curriculos_area', function (Blueprint $table) {
            $table->unsignedInteger('curriculo_id');
            $table->unsignedInteger('area_id');
            $table->foreign('curriculo_id')->references('id')->on('curriculos');
            $table->foreign('area_id')->references('id')->on('areas');
        });

        $areas = [];
        $areas[]['descricao'] = "TECNOLOGIA DA INFORÇÃO(BANCO DE DADOS E DESENVOLVIMENTO)";
        $areas[]['descricao'] = "TECNOLOGIA DA INFORÇÃO(INFRAESTRUTURA)";
        $areas[]['descricao'] = "GEOPROCESSAMENTO";
        $areas[]['descricao'] = "FLORESTAL";
        $areas[]['descricao'] = "FÁBRICA / PRODUÇÃO";
        $areas[]['descricao'] = "SEGURANÇA E MEDICINA DO TRABALHO";
        $areas[]['descricao'] = "SEGURANÇA PATRIMONIAL";
        $areas[]['descricao'] = "CONTABILIDADE / FINANCEIRO";
        $areas[]['descricao'] = "ADMINISTRATIVO / DEPARTAMENTO PESSOAL";
        $areas[]['descricao'] = "OUTRA";


        DB::table('areas')->insert($areas);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
