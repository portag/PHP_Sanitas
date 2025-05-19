<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $dni = $request->input('dni');
        $tarjetasanitaria = $request->input('tarjetasanitaria');
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public');
            $imagen = str_replace('public', 'storage', $path);
        } else {
            // Cuando no hay archivo subido, usar el valor del input hidden (la URL)
            $imagen = $request->input('imagen');
        }
       



        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'fnacimiento' => $request->fnacimiento,
            'dni' => $dni,
            'tarjetasanitaria' => $tarjetasanitaria,
            'imagen' => $imagen
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
