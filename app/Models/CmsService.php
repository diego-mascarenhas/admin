<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsService extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'grupo',
        'id_empresa',
        'id_categoria',
        'frecuencia'
    ];
}
