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
        $areas[]['descricao'] = "TECNOLOGIA DA INFORMAÇÃO (DESENVOLVIMENTO / BANCO DE DADOS)";
        $areas[]['descricao'] = "TECNOLOGIA DA INFORMAÇÃO (INFRAESTRUTURA DE REDE / SUPORTE)";
        $areas[]['descricao'] = "GEOPROCESSAMENTO";
        $areas[]['descricao'] = "FLORESTAL";
        $areas[]['descricao'] = "FÁBRICA / PRODUÇÃO";
        $areas[]['descricao'] = "SEGURANÇA E MEDICINA DO TRABALHO";
        $areas[]['descricao'] = "SEGURANÇA PATRIMONIAL";
        $areas[]['descricao'] = "CONTABILIDADE / FINANCEIRO";
        $areas[]['descricao'] = "ADMINISTRATIVO / DEPARTAMENTO PESSOAL";


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
