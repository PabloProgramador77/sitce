<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('numeroControl');
            $table->string('curp');
            $table->string('nombre');
            $table->string('primerApellido');
            $table->string('segundoApellido')->nullable();
            $table->bigInteger('idGenero')->unsigned();
            $table->string('fechaNacimiento');
            $table->string('fotografia')->nullable();
            $table->string('firmaAutografa')->nullable();
            $table->bigInteger('idInstitucion')->unsigned();
            $table->bigInteger('idCarrera')->unsigned();
            $table->timestamps();

            $table->foreign('idGenero')->references('id')->on('generos')->onDelete('cascade');
            $table->foreign('idInstitucion')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('idCarrera')->references('id')->on('carreras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
