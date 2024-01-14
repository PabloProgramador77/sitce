<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('idAsignatura');
            $table->string('claveAsignatura')->nullable();
            $table->string('nombreAsignatura')->nullable();
            $table->bigInteger('idTipoAsignatura')->unsigned();
            $table->string('creditos');
            $table->bigInteger('idInstitucion')->unsigned();
            $table->timestamps();

            $table->foreign('idTipoAsignatura')->references('id')->on('tipo_asignaturas')->onDelete('cascade');
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
        Schema::dropIfExists('asignaturas');
    }
}
