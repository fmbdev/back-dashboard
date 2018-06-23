<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacificaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacifica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Cliente');
            $table->string('Asesor_Contacto');
            $table->string('Vendedor_atendera');
            $table->string('Medio_gral');
            $table->string('Medio_mkt');
            $table->string('Medio_ventas');
            $table->string('Medio_promocion');
            $table->string('Medio_citamkt');
            $table->string('Recomendador');
            $table->string('Nombre');
            $table->date('Fecha_Nacimiento');
            $table->string('Telefono_Casa');
            $table->string('Telefono_Celular');
            $table->string('Tiene_Correo');
            $table->string('Email');
            $table->string('Lugar_Trabajo');
            $table->string('Ciudad');
            $table->string('Colonia');
            $table->string('Estado_Civil');
            $table->string('Valor_Vivienda');
            $table->string('Tipo_Ingreso');
            $table->string('Ingreso_MXN');
            $table->string('Ingreso_Dlls');
            $table->string('Otro_ingreso');
            $table->string('Aviso_privacidad');
            $table->string('Semana');
            $table->string('Viable');
            $table->string('Comentarios');
            $table->string('Otro');
            $table->date('Fecha_Registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacifica');
    }
}
