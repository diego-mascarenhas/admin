<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsContact extends Model
{
    use HasFactory;

    protected $table = 'contactos';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'grupo',
        'id_empresa',
        'nombre',
        'email',
        'celular',
        'data'
    ];
}
