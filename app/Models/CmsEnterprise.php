<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsEnterprise extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'grupo',
        'empresa',
        'web',
        'id_contacto',
        'id_forma_pago',
        'id_factura_tipo'
    ];
}