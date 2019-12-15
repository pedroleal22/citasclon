<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Enfermedad;
use App\Especialidad;
use App\Medico;



class PacienteController extends Controller
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

    //Modificación para el filtro
    public function index(Request $request) //ahora recibe un request
    {

        $especialidades= Especialidad::all()->pluck('name','id');
        //Filtro
        $especialidad_id=$request->get('especialidad_id');
        $query_base = Paciente::orderBy('id', 'desc');
        if(isset($especialidad_id) && $especialidad_id!=""){
            $query_base->where('especialidad_id',$especialidad_id);
        }
        $pacientes = $query_base->paginate(6);
        return view('pacientes/index',compact('pacientes'),['especialidades'=>$especialidades])->withUsers($pacientes);

        //$pacientes = Paciente::all();
        //return view('pacientes/index',['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfermedads = Enfermedad::all()->pluck('nombreComun','id');
        return view('pacientes/create',['enfermedads'=>$enfermedads]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Añade especialidad_id a paciente
        $enfermedad_id=$request->get('enfermedad_id');
        $enfermedad=Enfermedad::find($enfermedad_id);
        $especialidad_id=$enfermedad->especialidad_id;
        $request->merge(["especialidad_id"=>$especialidad_id]);
        //

        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255',
            'enfermedad_id' => 'required|exists:enfermedads,id',
            'especialidad_id'=>'required|exists:especialidads,id' //nuevo campo

        ]);

        $paciente = new Paciente($request->all());
        $paciente->save();

        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: Mostrar las citas de un paciente
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $enfermedads = Enfermedad::all()->pluck('nombreComun','id');

        return view('pacientes/edit',['paciente'=> $paciente,'enfermedads'=>$enfermedads ]);
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
        //
        $enfermedad_id=$request->get('enfermedad_id');
        $enfermedad=Enfermedad::find($enfermedad_id);
        $especialidad_id=$enfermedad->especialidad_id;
        $request->merge(["especialidad_id"=>$especialidad_id]);
        //

        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255',
            'enfermedad_id' => 'required|exists:enfermedads,id',
            'especialidad_id'=>'required|exists:especialidads,id'
        ]);

        $paciente = Paciente::find($id);
        $paciente->fill($request->all());

        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('pacientes.index');
    }
}
