<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads';

    protected $fillable = [
        'id', 'Nombre', 'Apellidos', 'Telefono', 'Celular', 'Email', 'FechaNacimiento', 'FechaCreacion',
        'DesarrolloInteres', 'Vaible', 'Tipidicacion', 'OtraTipificacion', 'Semana', 'Comentario'
    ];
}
