<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oporto extends Model
{
    protected $table = 'oporto';

    protected $fillable = [
        'id', 'Cliente', 'Asesor_Contacto', 'Vendedor_atendera', 'Medio_gral', 'Medio_mkt', 'Medio_ventas', 'Medio_promocion',
        'Medio_citamkt', 'Recomendador', 'Nombre', 'Fecha_Nacimiento', 'Telefono_Casa', 'Telefono_Celular', 'Tiene_Correo',
        'Email', 'Lugar_Trabajo', 'Ciudad', 'Colonia', 'Estado_Civil', 'Valor_Vivienda', 'Tipo_Ingreso', 'Ingreso_MNX',
        'Ingreso_DLLs', 'Otro_ingreso', 'Aviso_privacidad', 'Semana', 'Viable', 'Comentarios', 'Otro', 'Fecha_Registro'
    ];
}
