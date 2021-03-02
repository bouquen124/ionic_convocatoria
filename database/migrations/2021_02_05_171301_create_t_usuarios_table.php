<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTUsuariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_tipo_id')->unsigned();
            $table->string('nombre');
            $table->integer('edad');
            $table->string('localidad');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('c_tipo_id')->references('id')->on('c_tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_usuarios');
    }
}
