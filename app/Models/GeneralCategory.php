<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCategory extends Model
{
    use HasFactory;

    protected $table = 'categorias_generales';

    protected $fillable = [
        'id',
        'grupo',
        'id_tipo',
        'categoria',
        'descripcion',
        'caracteristicas',
        'id_moneda',
        'convertir',
        'valor',
        'descuento',
        'frecuencia',
        'orden',
        'estado',
        'username_alta',
        'username_modificacion'
    ];
}
