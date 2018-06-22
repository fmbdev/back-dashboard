<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('Telefono');
            $table->string('Celular');
            $table->string('Email');
            $table->date('FechaNacimiento');
            $table->date('FechaCreacion');
            $table->string('DesarrolloInteres');
            $table->string('Viable');
            $table->string('Tipificacion');
            $table->string('OtraTipificacion');
            $table->string('Semana');
            $table->string('Comentarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
