<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;
class noticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('web.noticias',['noticias'=>Noticia::orderBy('created_at', 'desc')->Paginate(8)]);

            } else if(Auth::user()->rol == 'medico') {
                return view('medico.noticias',['noticias'=>Noticia::orderBy('created_at', 'desc')->Paginate(8)]);

            }else{
                return view('usuario.noticias',['noticias'=>Noticia::orderBy('created_at', 'desc')->Paginate(8)]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('usuario.noticias',['noticias'=>Noticia::orderBy('created_at', 'desc')->get()]);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Centro $centro)
    {
        //
        return view('web.nuevaNoticia', ['centro'=>$centro]);
    }

    public function createGeneral()
    {
        //
        return view('web.nuevaNoticiaGeneral', ['centros'=>Centro::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $noticia = new Noticia();
        $noticia->titular = $request->input('titular');
        $noticia->texto = $request->input('texto');
        $noticia->centro_id = $request->input('centro');

        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $noticia->imagen =  str_replace('public', 'storage', $path);

        $noticia->save();

        //nos lleva a la pagina del centro donde hemos creado la noticia
        return redirect('/centros/noticias/'.$noticia->centro_id = $request->input('centro'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Centro $centro)
    {
        //

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
    public function destroy(Noticia $noticia)
    {
        //
        $noticia->delete();
        return redirect('noticias');
    }

    public function centroDestroy(Noticia $noticia, Request $request)
    {
        //
        $centro = new Centro();
        $noticia->delete();
        return redirect('/centros/noticias/'.$centro->id = $request->input('centro'));
    }
}
