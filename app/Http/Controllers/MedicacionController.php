<?php

namespace App\Http\Controllers;

use App\Medicacion;
use App\Medicina;
use App\Tratamiento;
use Illuminate\Http\Request;

class MedicacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $medicacions = Medicacion::all();

        return view('medicacions/index',['medicacions'=>$medicacions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');
        $medicinas = Medicina::all()->pluck('name','id');

        return view('medicacions/create',['tratamientos'=>$tratamientos],['medicinas'=>$medicinas]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'unidades' => 'required|max:255',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',

        ]);

        $medicacion = new Medicacion($request->all());
        $medicacion->save();

        flash('Medicacion creada correctamente');

        return redirect()->route('medicacions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicacion = Medicacion::find($id);
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');
        $medicinas = Medicina::all()->pluck('name','id');

        return view('medicacions/edit',['medicacion'=> $medicacion, 'tratamientos'=>$tratamientos,'medicinas'=>$medicinas ]);



    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tratamiento_id' => 'required|exists:tratamientos,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'unidades' => 'required|max:255',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',

        ]);

        $medicacion = Medicacion::find($id);
        $medicacion->fill($request->all());

        $medicacion->save();

        flash('Medicacion modificada correctamente');

        return redirect()->route('medicacions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicacion  $medicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicacion = Medicacion::find($id);
        $medicacion->delete();
        flash('Medicacion borrada correctamente');

        return redirect()->route('medicacions.index');
    }
}
