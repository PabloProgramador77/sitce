<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();
            $table->string('curp');
            $table->string('nombre');
            $table->string('primerApellido');
            $table->string('segundoApellido')->nullable();
            $table->bigInteger('idCargo')->unsigned();
            $table->string('archivoCer');
            $table->string('archivoKey');
            $table->string('passwordKey');
            $table->bigInteger('idInstitucion')->unsigned();
            $table->timestamps();

            $table->foreign('idCargo')->references('id')->on('cargos')->onDelete('cascade');
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
        Schema::dropIfExists('responsables');
    }
}
