<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cpanel extends Model
{
    use HasFactory;
    public static function createacct($cpanelUsername, $cpanelPassword, $cpanelHost, $planName, $newDomain)
    {
        $apiUrl = "$cpanelHost/execute/whm/createacct";
        
        $data = array(
            'username' => $cpanelUsername,
            'password' => $cpanelPassword,
            'plan' => $planName,
            'domain' => $newDomain,
        );

        $response = Http::post($apiUrl, $data);

        if ($response->failed()) {
            return 'Error al conectarse a la API de cPanel: ' . $response->body();
        }

        // Procesar la respuesta (puede ser JSON o texto plano)
        $responseData = $response->json(); // Si la respuesta es JSON
        return $responseData;
    }
}
