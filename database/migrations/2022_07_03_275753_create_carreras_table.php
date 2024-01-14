<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('idCarrera');
            $table->string('nombreCarrera')->nullable();
            $table->string('claveCarrera')->nullable();
            $table->string('rvoe');
            $table->string('fechaExpedicionRvoe');
            $table->bigInteger('idTipoPeriodo')->unsigned();
            $table->string('clavePlan');
            $table->bigInteger('idNivelEstudios')->unsigned();
            $table->string('calificacionMinima');
            $table->string('calificacionMaxima');
            $table->string('calificacionMinimaAprobatoria');
            $table->bigInteger('idInstitucion')->unsigned();
            $table->timestamps();

            $table->foreign('idTipoPeriodo')->references('id')->on('periodos')->onDelete('cascade');
            $table->foreign('idNivelEstudios')->references('id')->on('nivel_estudios')->onDelete('cascade');
            $table->foreign('idInstitucion')->references('id')->on('instituciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
