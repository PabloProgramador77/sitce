<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreArchivo');
            $table->bigInteger('idExpedicion')->unsigned();
            $table->bigInteger('idInstitucion')->unsigned();
            $table->timestamps();

            $table->foreign('idExpedicion')->references('id')->on('expediciones')->onDelete('cascade');
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
        Schema::dropIfExists('archivos');
    }
}
