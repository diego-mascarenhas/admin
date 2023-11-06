<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsGeneralCategory;

use App\Mail\ContratarEnvio;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

use App\Models\CmsContact;
use App\Models\CmsEnterprise;
use App\Models\CmsEnrterpriseBilling;
use App\Models\CmsService;

class ContratarController extends Controller
{
    public function create($id)
    {
        $item = CmsGeneralCategory::find($id);

        $item->caracteristicas = json_decode($item->caracteristicas, true);

        return view('site.contratar', compact('item'));
    }


    public function store(Request $request)
    {
        // if ($request->has('dominio'))
        // {
        //     $dominio = $request->input('dominio');

        //     if (substr($dominio, 0, 4) !== 'http')
        //     {
        //         $dominio = 'http://' . $dominio;
        //     }

        //     $request->merge(['dominio' => $dominio]);
        // }

        if (auth()->guest())
        {
            $password = Str::random(12);

            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|min:3|max:100',
                'empresa' => 'nullable|string',
                'email' => 'required|string|email|max:255|unique:users',
                'telefono' => 'nullable|string|max:20',
                'razon_social' => 'required|string',
                'documento' => 'required|string',
                'id' => 'required|integer',
                'terminos' => 'accepted',
                //'dominio' => 'url',
                'dominio' => [
                    'nullable',
                    'string',
                    function ($attribute, $value, $fail) use ($request)
                    {
                        if (in_array($request->input('id_tipo'), [1, 2]) && empty($value))
                        {
                            $fail('El dominio es obligatorio para los planes de Hosting');
                        }
                    },
                ],
            ]);
    
            if ($validator->fails())
            {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Crear un nuevo usuario
            $user = new User;
            $user->name = $request->input('nombre');
            $user->email = $request->input('email');
            $user->password = Hash::make($password);
            $user->save();

            // Iniciar sesión automáticamente
            event(new Registered($user));
            auth()->login($user, true); // Con el segundo parámetro se mantiene logueado

            // Crear contacto
            $contact = new CmsContact;
            $contact->grupo = env('CMSGROUP');
            $contact->id_user = $user->id;
            $contact->nombre = $request->input('nombre');
            $contact->email = $request->input('email');
            $contact->celular = ($request->input('telefono')) ? $request->input('telefono') : null;
            $contact->data = json_encode($request->input());
            $contact->save();
            
            // Crear empresa
            $enterprise = new CmsEnterprise;
            $enterprise->grupo = env('CMSGROUP');
            $enterprise->empresa = ($request->input('empresa')) ? $request->input('empresa') : $request->input('name');
            $enterprise->id_contacto = $contact->id;
            $enterprise->web = ($request->input('dominio')) ? $request->input('dominio') : null;
            $enterprise->id_forma_pago = $request->input('id_forma_pago');
            $enterprise->id_factura_tipo = $request->input('id_factura_tipo');
            $enterprise->save();

            // Crear datos fiscales
            $billing = new CmsEnrterpriseBilling;
            $billing->grupo = env('CMSGROUP');
            $billing->id_empresa = $enterprise->id;
            $billing->razon_social = $request->input('razon_social');
            $billing->cuit = $request->input('documento');
            $billing->save();

            // Asociar contacto a la empresa
            $contact = CmsContact::find($contact->id);
            $contact->id_empresa = $enterprise->id;
            $contact->save();

            // Crear servicio
            $service = new CmsService;
            $service->grupo = env('CMSGROUP');
            $service->id_empresa = $enterprise->id;
            $service->id_categoria = $request->input('id');
            $service->frecuencia = $request->input('frecuencia');
            $service->save();

            $nombre = $request->input('nombre');
            $email = $request->input('email');
            $id = $request->input('id');
            $plan = $request->input('descripcion') . ' (' . $id . ')';
            $dominio = $request->input('dominio');
            $cupon = $request->input('cupon');
        }
        else
        {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
                'terminos' => 'accepted',
                //'dominio' => 'url',
                'dominio' => [
                    'nullable',
                    'string',
                    function ($attribute, $value, $fail) use ($request)
                    {
                        if (in_array($request->input('id_tipo'), [1, 2]) && empty($value))
                        {
                            $fail('El dominio es obligatorio para los planes de Hosting');
                        }
                    },
                ],
            ]);
    
            if ($validator->fails())
            {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
    
            // Crear servicio
            $service = new CmsService;
            $service->grupo = env('CMSGROUP');
            $service->id_empresa = CmsContact::getIdEnterpriseFromIdUser(auth()->user()->id);
            $service->id_categoria = $request->input('id');
            $service->frecuencia = $request->input('frecuencia');
            $service->save();

            $nombre = auth()->user()->name;
            $email = auth()->user()->email;
            $password = null;
            $id = $request->input('id');
            $plan = $request->input('descripcion') . ' (' . $id . ')';
            $dominio = $request->input('dominio');
            $cupon = $request->input('cupon');
        }

        
        $email = new ContratarEnvio($nombre, $email, $password, $plan, $dominio, $cupon);

        try
        {
            Mail::to('formularios@admin.revisionalpha.es')->send($email);

            return redirect()->route('contratar.create', ['id' => $id])->with('success', 'Su plan ha sido dado de alta, por favor verifique su casilla para validar su email');
        }
        catch (\Exception $e)
        {
            return redirect()->route('contratar.create', ['id' => $id])->with('error', 'Se ha producido un error al querer crear el plan, por favor inténtalo más tarde. (' . $e->getMessage() . ')');
        }
    }


}
