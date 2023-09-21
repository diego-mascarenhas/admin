<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Contacto;

class InsertContactosRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $contacto = new Contacto();
        $contacto->nombre = 'CMS';
        $contacto->apellido = 'Administrator';
        $contacto->email = 'admin@gmail.com';
        $contacto->id_perfil = 2;
        $contacto->username = 'admin@gmail.com';
        $contacto->password = 'Passw0rd!';
        $contacto->estado = 2;
        $contacto->save();

        $contacto = new Contacto();
        $contacto->nombre = 'José Luis';
        $contacto->apellido = 'Goytía';
        $contacto->email = 'tester1@gmail.com';
        $contacto->telefono = '12345678';
        $contacto->documento = '824967B';
        $contacto->id_perfil = 3;
        $contacto->username = 'tester1@gmail.com';
        $contacto->password = 'Passw0rd!';
        $contacto->estado = 2;
        $contacto->save();

        $contacto = new Contacto();
        $contacto->nombre = 'María Laura';
        $contacto->apellido = 'Urruchua';
        $contacto->email = 'tester2@gmail.com';
        $contacto->telefono = '12765678';
        $contacto->documento = '72767B';
        $contacto->id_perfil = 3;
        $contacto->username = 'tester2@gmail.com';
        $contacto->password = 'Passw0rd!';
        $contacto->estado = 2;
        $contacto->save();

        $contacto = new Contacto();
        $contacto->nombre = 'Antonio Carlos';
        $contacto->apellido = 'Nuñez';
        $contacto->email = 'tester3@gmail.com';
        $contacto->telefono = '12765678';
        $contacto->documento = '72767B';
        $contacto->id_perfil = 3;
        $contacto->username = 'tester3@gmail.com';
        $contacto->password = 'Passw0rd!';
        $contacto->estado = 2;
        $contacto->save();

        $contacto = new Contacto();
        $contacto->nombre = 'Pedro Raúl';
        $contacto->apellido = 'Urrutia';
        $contacto->email = 'tester4@gmail.com';
        $contacto->telefono = '12765678';
        $contacto->documento = '72767B';
        $contacto->id_perfil = 3;
        $contacto->username = 'tester4@gmail.com';
        $contacto->password = 'Passw0rd!';
        $contacto->estado = 2;
        $contacto->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
