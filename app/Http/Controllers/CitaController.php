<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;

use Carbon\Carbon;


class CitaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('full_name','id');
        $pacientes = Paciente::all()->pluck('full_name','id');

        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            //'localizacion' => 'required|max:255',
            'duracion' => 'required|max:255',
        ]);
        /*
        $fecha_horaP = Carbon::parse($request['fecha_hora']);
        $duracion = $request['duracion'];
        */
        //$request['hora_fin'] = $request['fecha_hora']; /*$fecha_horaP->modify("+{$duracion} minutes");*/

        //$cita = new Cita($request->all());

        $cita = Cita::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'fecha_hora' => $request->fecha_hora,
            //'localizacion' => $request->localizacion,
            'duracion' => $request->duracion,
            //'hora_fin' => $request['fecha_hora']
            'hora_fin' => Carbon::parse($request['fecha_hora'])->modify("+{$request['duracion']} minutes")

        ]);

        $cita->save();

        flash('Cita creada correctamente');

        return redirect()->route('citas.index');

        /*
        $duracionP = Carbon::parse($request['duracion']);

        //$hora_fin = $fecha_hora;

        //$hora_fin->add(new DateInterval('PT' . $duracion2 . 'M'));
        //$hora_fin->modify("+{$duracion} minutes");

        //$fecha_horaP = $request['fecha_hora'];

        //$request['hora_fin'] =  $fecha_horaP->calcHoraFin($fecha_horaP, $duracionP);
        //$request['hora_fin'] =  $request['fecha_hora']->modify("+{$duracion} minutes");
        //'end_time' => Booking::calcEndTime(Activity::find($request->activity_id)->duration, $request->start_time)

        $cita = Cita::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'fecha_hora' => $request->fecha_hora,
            'localizacion' => $request->localizacion,
            'hora_fin' => $request->hora_fin
        ]);
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('full_name','id');

        $pacientes = Paciente::all()->pluck('full_name','id');


        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'pacientes'=>$pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',


        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());

        /*
        $cita = Cita::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'fecha_hora' => $request->fecha_hora,
            //'localizacion' => $request->localizacion,
            'duracion' => $request->duracion,
            //'hora_fin' => $request['fecha_hora']
            'hora_fin' => Carbon::parse($request['fecha_hora'])->modify("+{$request['duracion']} minutes")

        ]);*/

        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
