<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCasosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_casos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion', 2000);
            $table->string('fecha');
            $table->integer('c_profesional_id')->unsigned();
            $table->integer('t_usuario_id')->unsigned();
            $table->integer('c_estado_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('c_profesional_id')->references('id')->on('c_profesionals');
            $table->foreign('t_usuario_id')->references('id')->on('t_usuarios');
            $table->foreign('c_estado_id')->references('id')->on('c_estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_casos');
    }
}
