<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCEstudiantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_clinica_id')->unsigned();
            $table->integer('c_profesional_id')->unsigned();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo');
            $table->string('localidad');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('c_clinica_id')->references('id')->on('c_clinicas');
            $table->foreign('c_profesional_id')->references('id')->on('c_profesionals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('c_estudiantes');
    }
}
