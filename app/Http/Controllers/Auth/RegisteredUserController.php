<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hermandade;
use App\Models\Titulare;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'tel_number' => 'required|regex:/^[0-9]{3}\s[0-9]{2}\s[0-9]{2}\s[0-9]{2}$/',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->has('perfil_hermandad')){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tel_number' => str_replace(' ', '', $request->tel_number),
                'password' => Hash::make($request->password),
                'rol' => 'nuevaHermandad',
                'icon' => 'Usuario_Default.png',
            ]);

            event(new Registered($user));

            $ultimo_usuario = User::orderBy('created_at', 'desc')->first();

            // Hermandade::insert(['id_usuario' => $ultimo_usuario->id, 'nombre_completo' => $request->nombre_completo, 'nombre' => $ultimo_usuario->name, 'escudo' => $ultimo_usuario->icon, 'header' => '', 'hermanos' => 0, 'cuota' => 0]);
            Hermandade::create([
                'id_usuario'      => $ultimo_usuario->id,
                'nombre_completo' => $request->nombre_completo,
                'nombre'          => $ultimo_usuario->name,
                'escudo'          => $ultimo_usuario->icon,
                'header'          => '',
                'hermanos'        => 0,
                'cuota'           => 0
            ]);

            $ultima_hermandad = Hermandade::orderBy('created_at', 'desc')->first();

            Log::info($ultima_hermandad);

            $titular_corto = $request->input('titular_corto');

            $titular_completo = $request->input('titular_completo');
            
            for ($i=0; $i<count($titular_corto)-1; $i++){
                $titular = Titulare::create([
                    'id_hermandad' => $ultima_hermandad->id,
                    'nombre_completo' => $titular_completo[$i],
                    'nombre_corto' => $titular_corto[$i],
                    'banda' => '',
                    'imagen' => ''
                ]);
            }
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tel_number' => str_replace(' ', '', $request->tel_number),
                'password' => Hash::make($request->password),
                'rol' => 'user', // AÑADIDO
                'icon' => 'Usuario_Default.png',
            ]);

            event(new Registered($user));
        }

        Auth::login($user);

        return redirect()->intended('/principal');
    }
}
