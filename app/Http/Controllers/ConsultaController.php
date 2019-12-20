<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Consulta;
use App\Enfermedad;
use App\Location;
use App\Medicina;
use App\Medico;
use App\Paciente;
use App\Tratamiento;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $consultas = Consulta::all();

        return view('consultas/index',['consultas'=>$consultas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){




        return view('consultas/create');


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

            'nombre' => 'required|max:255'

        ]);


        $consulta = new Consulta($request->all());
        $consulta->save();

        flash('Consulta creada correctamente');

        return redirect()->route('consultas.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
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
        $consulta = Consulta::find($id);


        return view('consultas/edit',['consulta'=> $consulta]);


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
            'nombre' => 'required|max:255',


        ]);

        $consulta=Consulta::find($id);
        $consulta-> fill($request->all());
        $consulta->save();

        flash('Consulta editada correctamente');

        return redirect()->route('consultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicina  $medicina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        $consulta->delete();
        flash('Consulta borrada correctamente');

        return redirect()->route('consultas.index');
    }
}

