<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Cita;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class citasController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    //citas que tienes como PACIENTE
    public function index()
    {
        $events = [];

        $appointments = Cita::all();

        foreach ($appointments as $appointment) {


            if (($appointment->user_id == Auth::user()->id) && $appointment->estado == 'abierta') {
                $centro = Centro::where('id', $appointment->centro_id)
                    ->value('nombre');
                $medico = User::where('id', $appointment->medico_id)
                    ->value('name');
                $events[] = [
                    'title' => 'Medico: ' . $medico . '; Centro: ' . $centro,
                    'start' => $appointment->fechainicio,
                    'end' => $appointment->fechafin,
                ];
            }
        }
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('web.citas', compact('events'));
            } else if (Auth::user()->rol == 'medico') {
                return view('medico.citas', compact('events'));
            } else {
                return view('usuario.citas', compact('events'));
            }
        }
        if (isEmpty(Auth::user())) {
            return view('usuario.citas', compact('events'));
        }
    }

    //citas que tienes como DOCTOR
    public function citaPacientes()
    {
        $events = [];

        $appointments = Cita::all();

        foreach ($appointments as $appointment) {

            if (($appointment->medico_id == Auth::user()->id) && $appointment->estado == 'abierta') {
                $nombrePaciente = User::where('id', $appointment->user_id)
                    ->value('name');
                $centro = Centro::where('id', $appointment->centro_id)
                    ->value('nombre');
                $events[] = [
                    'title' => 'Paciente: ' . $nombrePaciente . '; Centro: ' . $centro,
                    'start' => $appointment->fechainicio,
                    'end' => $appointment->fechafin,
                ];
            }
        }

        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('web.citas', compact('events'));
            } else if (Auth::user()->rol == 'medico') {
                return view('medico.citas', compact('events'));
            } else {
                return view('usuario.citas', compact('events'));
            }
        }
        if (isEmpty(Auth::user())) {
            return view('usuario.citas', compact('events'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Centro $centro, Request $request)
    {
        $events = [];

        $appointments = Cita::all();
        $usuario = $request->input('medico');
        foreach ($appointments as $appointment) {

            if ($appointment->medico_id == $usuario && $appointment->estado == 'abierta') {
                //devuelve el nombre de los parametros de la cita, en este caso, solo pasamos 3
                $events[] = [
                    'title' => 'Centro: ' . $centro->nombre,
                    'start' => $appointment->fechainicio,
                    'end' => $appointment->fechafin,
                ];
            }
        }



        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('web.nuevaCita', ['medico' => $usuario, 'centro' => $centro], compact('events'));
            } else if (Auth::user()->rol == 'medico') {
                return view('medico.nuevaCita', ['medico' => $usuario, 'centro' => $centro], compact('events'));
            } else {
                return view('usuario.nuevaCita', ['medico' => $usuario, 'centro' => $centro], compact('events'));
            }
        }
        if (isEmpty(Auth::user())) {
            return view('usuario.nuevaCita', ['medico' => $usuario, 'centro' => $centro], compact('events'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cita = new Cita();
        $cita->user_id = $request->input('usuario');
        $cita->medico_id = $request->input('medico');
        $cita->centro_id = $request->input('centro');
        $cita->estado = 'abierta';
        $cita->fechainicio = $request->input('fechaInicio');
        $fechaInicio = Carbon::parse($cita->fechainicio)->addHours(2);
        $cita->fechainicio = $fechaInicio;
        $cita->fechafin = $request->input('fechaHoraMas1h');
        $fechafin = Carbon::parse($cita->fechainicio)->addMinutes(30);
        $cita->fechafin = $fechafin;

        $citaExistente = Cita::where('medico_id', $request->input('medico'))
            ->where('fechainicio', $request->input('fechaInicio'))
            ->exists();

        if ($citaExistente) {
            return response()->json(['error' => 'Ya existe una cita programada en esa fecha y hora para ese médico']);
        }

        $cita->save();

        return redirect('/citas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy()
    {

        
    }
}
