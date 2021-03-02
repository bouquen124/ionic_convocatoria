<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCBoletinsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_boletins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_profesional_id')->unsigned();
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('contenido', 1000);
            $table->string('autor');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('c_boletins');
    }
}
