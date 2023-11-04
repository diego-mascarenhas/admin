<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsEnrterpriseBilling extends Model
{
    use HasFactory;
    protected $table = 'empresas_fiscales';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'grupo',
        'id_empresa',
        'razon_social',
        'cuit'
    ];
}
