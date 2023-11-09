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

    public static function getIdEnterpriseBillingFromIdEnterprise($id_empresa) {
        $empresa_fiscal = self::where('id_empresa', $id_empresa)->first();

        if ($empresa_fiscal) {
            return $empresa_fiscal->id;
        } else {
            return null;
        }
    }
}
