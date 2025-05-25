<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{

    public function index()
    {
        return view('web.usuarios', ['users' => User::Paginate(10)]);
    }


    //actualizar el rol de un usuario via web(evitar el uso de mySQL)
    public function updateRol(Request $request)
    {
        $rol = $request->input('rol');
        $id = $request->input('id');
        $user = User::find($id);
        $user->rol = $rol;


        $user->save();

        return view('web.usuarios', ['users' => User::Paginate(10)]);
    }


    public function updateImagen(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->id);

        // Solo el usuario mismo o un admin puede actualizar la imagen
        if (auth()->id() !== $user->id && auth()->user()->rol !== 'admin') {
            abort(403);
        }

        // Eliminar imagen anterior si no es la default
        if ($user->imagen && $user->imagen !== 'img/default_pic.png') {
            Storage::delete($user->imagen);
        }

        $path = $request->file('imagen')->store('img', 'public');

        $user->imagen = 'storage/' . $path;
        $user->save();

        return view('web.usuarios', ['users' => User::Paginate(10)]);
    }

    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
