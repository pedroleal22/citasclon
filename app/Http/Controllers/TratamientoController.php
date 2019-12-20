<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Enfermedad;
use App\Medicina;
use App\Medico;
use App\Paciente;
use App\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $tratamientos = Tratamiento::all();
        return view('tratamientos/index',['tratamientos'=>$tratamientos]);

    }

    public function addMedicacion($id)
    {
        $tratamiento = Tratamiento::find($id);
        $medicacions = Medicacion::where('tratamiento_id', $id)->get();
        return view('tratamientos/addMedicacion', ['tratamiento' => $tratamiento, 'medicacions' => $medicacions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        //'id');
        //            $table->dateTime('fecha_inicio');
        //            $table->dateTime('fecha_fin');
        //            $table->string('descripcion');

        //$citas = Cita::all()->pluck('full_name','id');



        return view('tratamientos/create');


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
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'descripcion' => 'required|max:255',

        ]);


        $tratamiento = new Tratamiento($request->all());
        $tratamiento->save();

        flash('Tratamiento creado correctamente');

        return redirect()->route('tratamientos.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamiento = Tratamiento::find($id);

        return view('tratamientos/edit',['tratamiento'=> $tratamiento]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'descripcion' => 'required|max:255',
        ]);

        $tratamiento=Tratamiento::find($id);
        $tratamiento-> fill($request->all());
        $tratamiento->save();

        flash('Tratamiento editado correctamente');

        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        flash('Tratamiento borrada correctamente');

        return redirect()->route('tratamientos.index');
    }
}

