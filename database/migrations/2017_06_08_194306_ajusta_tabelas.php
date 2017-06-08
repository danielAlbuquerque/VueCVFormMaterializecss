<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjustaTabelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curriculos', function (Blueprint $table) {
            $table->string('bairro')->nullable()->change();
            $table->string('endereco')->nullable()->change();

            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('cep')->nullable();
            $table->string('arquivo')->nullable();

            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
