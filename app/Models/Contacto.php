<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'contactos';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'documento',
        'id_perfil',
        'username',
        'password',
        'estado',
        // Agrega aquí los demás campos de tu tabla
    ];

    /**
     * Los atributos que deben ocultarse para las matrices.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
