<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use function PHPUnit\Framework\isEmpty;

class centrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('web.centros', ['centros' => Centro::Paginate(8)]);
            } else if (Auth::user()->rol == 'medico') {
                return view('medico.centros', ['centros' => Centro::Paginate(8)]);
            } else {
                return view('usuario.centros', ['centros' => Centro::Paginate(8)]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('usuario.centros', ['centros' => Centro::all()]);
        }
    }


    //muestra los centros que cumplan con los requisitos de filtrado, es decir, que tengan medicos con la especialidad seleccionada
    public function indexFiltro(Request $request)
    {
        $especialidad = $request->input('especialidad'); // Obtener la especialidad del formulario

        $centros = Centro::whereHas('componentes', function ($query) use ($especialidad) {
            $query->where('especialidad', $especialidad);
        })->paginate(8);


        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('web.centros', ['centros' => $centros]);
            } else if (Auth::user()->rol == 'medico') {
                return view('medico.centros', ['centros' => $centros]);
            } else {
                return view('usuario.centros', ['centros' => $centros]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('usuario.centros', ['centros' => $centros]);
        }
    }


    public function filtroMedico($id, Request $request)
    {
        $centro = Centro::findOrFail($id);
        $especialidad = $request->input('especialidad'); // Obtener la especialidad del formulario

        $usuariosQuery = $centro->componentes();

        // Si hay filtro, lo aplicamos
        if ($especialidad) {
            $usuariosQuery->where('especialidad', $especialidad);
        }

        $usuarios = $usuariosQuery->paginate(8);

        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('web.detalleCentro', [
                    'centro' => $centro,
                    'usuarios' => $usuarios,
                    'especialidad' => $especialidad,
                ]);
            } else if (Auth::user()->rol == 'medico') {
                return view('medico.detalleCentro', [
                    'centro' => $centro,
                    'usuarios' => $usuarios,
                    'especialidad' => $especialidad,
                ]);
            } else {
                return view('usuario.detalleCentro', [
                    'centro' => $centro,
                    'usuarios' => $usuarios,
                    'especialidad' => $especialidad,
                ]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('usuario.detalleCentro', [
                'centro' => $centro,
                'usuarios' => $usuarios,
                'especialidad' => $especialidad,
            ]);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('web.nuevoCentro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $centro = new Centro();
        $centro->nombre = $request->input('nombre');
        $centro->localidad = $request->input('localidad');
        $centro->telefono = $request->input('telefono');
        $centro->latitud = $request->input('latitud');
        $centro->longitud = $request->input('longitud');
        $path = $request->file('imagen')->store('public');
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $centro->imagen =  str_replace('public', 'storage', $path);

        $centro->save();

        return redirect('/centros');
    }



    /**
     * Añadir varios medicos de una como admin
     */
    public function addMedicos(Request $request, $centroId)
    {
        $request->validate([
            'usuarios' => 'required|array',
            'usuarios.*' => 'exists:users,id',
        ]);

        $centro = Centro::findOrFail($centroId);

        foreach ($request->usuarios as $usuarioId) {
            $usuario = User::where('id', $usuarioId)
                ->whereIn('rol', ['medico', 'admin'])
                ->first();

            if ($usuario && !$centro->componentes->contains($usuario->id)) {
                $centro->componentes()->attach($usuario->id);
            }
        }

        return redirect()->back()->with('success', 'Usuarios asignados correctamente.');
    }



    /**
     * muestra los detalles del centro y personal, sin noticias.
     */
    public function show(Centro $centro)
    {
        if (isset(Auth::user()->rol)) {

            $usuariosAsignados = $centro->componentes()->paginate(8);
            $usuariosAsignadosIds = $centro->componentes->pluck('id');

            $usuariosDisponibles = User::whereNotIn('id', $usuariosAsignadosIds)
                ->whereIn('rol', ['medico', 'admin'])
                ->get();

            if (Auth::user()->rol == 'admin') {
                return view('web.detalleCentro', [
                    'centro' => $centro,
                    'usuarios' => $usuariosAsignados,
                    'usuariosDisponibles' => $usuariosDisponibles
                ]);
            } else if (Auth::user()->rol == 'medico') {
                return view('medico.detalleCentro', [
                    'centro' => $centro,
                    'usuarios' => $usuariosAsignados,
                    'usuariosDisponibles' => $usuariosDisponibles
                ]);
            } else {
                return view('usuario.detalleCentro', [
                    'centro' => $centro,
                    'usuarios' => $usuariosAsignados,
                    'usuariosDisponibles' => $usuariosDisponibles
                ]);
            }
        }

        // Para usuarios no autenticados o sin rol definido
        if (empty(Auth::user())) {
            return view('usuario.detalleCentro', [
                'centro' => $centro,
                'usuarios' => $centro->componentes()->get(),
                'usuariosDisponibles' => collect() // colección vacía para evitar errores
            ]);
        }
    }



    //muestra el centro con sus noticias
    public function showNoticias(Centro $centro)
    {
        //
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view("web.noticiasCentro", ['centro' => $centro, 'noticias' => $centro->noticias()->orderBy('created_at', 'desc')->Paginate(8)]);
            } else if (Auth::user()->rol == 'medico') {
                return view("medico.noticiasCentro", ['centro' => $centro, 'noticias' => $centro->noticias()->orderBy('created_at', 'desc')->Paginate(8)]);
            } else {
                return view("usuario.noticiasCentro", ['centro' => $centro, 'noticias' => $centro->noticias()->orderBy('created_at', 'desc')->Paginate(8)]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view("usuario.noticiasCentro", ['centro' => $centro, 'noticias' => $centro->noticias()->get()]);
        }
    }


    //unirse a un centro de trabajo
    public function inscribir(Centro $centro, User $user)
    {
        if ($centro->componentes()->where('user_id', $user->id)->get()->count() == 0) {
            $centro->componentes()->attach($user->id, ['created_at' => Carbon::now()]);
        }

        return redirect('centros/' . $centro->id);
    }

    //quitarse de un centro de trabajo
    public function desinscribir(Centro $centro, User $user)
    {
        if ($centro->componentes()->where('user_id', $user->id)->get()->count() == 1) {
            $centro->componentes()->detach($user->id);
        }

        return redirect('centros/' . $centro->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centro $centro)
    {
        //
        $centro->delete();
        return redirect('centros');
    }
}
