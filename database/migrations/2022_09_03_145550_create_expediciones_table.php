<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediciones', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->bigInteger('idTipoCertificacion')->unsigned();
            $table->string('idLugarExpedicion');
            $table->bigInteger('idAlumno')->unsigned();
            $table->timestamps();

            $table->foreign('idAlumno')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('idTipoCertificacion')->references('id')->on('tipo_certificaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expediciones');
    }
}
