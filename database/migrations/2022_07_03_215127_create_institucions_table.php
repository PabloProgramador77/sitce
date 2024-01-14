<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->id();
            $table->string('idInstitucion');
            $table->string('nombreInstitucion')->nullable();
            $table->string('idCampus');
            $table->string('campus')->nullable();
            $table->bigInteger('idEntidadFederativa')->unsigned();
            $table->string('email');
            $table->string('password');
            $table->string('avatarInstitucion');
            $table->string('tipoAvatarInstitucion');
            $table->string('estatusInstitucion');
            $table->timestamps();

            $table->foreign('idEntidadFederativa')->references('id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituciones');
    }
}
