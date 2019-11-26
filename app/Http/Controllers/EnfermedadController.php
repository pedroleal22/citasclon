<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Especialidad;

use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedads = Enfermedad::all();

        return view('enfermedads/index',['enfermedads'=>$enfermedads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('enfermedads/create',['especialidades'=>$especialidades]);

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
            'nombreComun' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);
        $enfermedad = new Enfermedad($request->all());
        $enfermedad->save();

        // return redirect('especialidades');

        flash('Especialidad creada correctamente');

        return redirect()->route('enfermedads.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enfermedad = Enfermedad::find($id);
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('enfermedads/edit',['enfermedad'=> $enfermedad, 'especialidades'=>$especialidades ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nombreComun' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);

        $enfermedad = Enfermedad::find($id);
        $enfermedad->fill($request->all());

        $enfermedad->save();

        flash('Enfermedad modificada correctamente');

        return redirect()->route('enfermedads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedad = Enfermedad::find($id);
        $enfermedad->delete();
        flash('Enfermedad borrada correctamente');

        return redirect()->route('enfermedads.index');
    }
}
