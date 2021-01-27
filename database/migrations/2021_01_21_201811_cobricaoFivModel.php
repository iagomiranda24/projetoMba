<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CobricaoFivModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobricaofivmodel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_criador');
            $table->string('data_aquisição');
            $table->string('matriz_doadora');
            $table->string('reprodutor');
            $table->string('raca');
            $table->string('categoria');
            $table->string('matriz_receptora');
            $table->integer('n_embrioes');
            $table->integer('n_registro');
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
        Schema::drop('cobricaoFivModel');

    }
}
