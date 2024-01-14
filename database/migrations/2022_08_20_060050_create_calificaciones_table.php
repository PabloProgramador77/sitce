<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idAsignatura')->unsigned();
            $table->bigInteger('idAlumno')->unsigned();
            $table->bigInteger('idObservacion')->unsigned();
            $table->string('calificacion');
            $table->string('estatusCalificacion');
            $table->timestamps();

            $table->foreign('idAsignatura')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('idObservacion')->references('id')->on('observaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
