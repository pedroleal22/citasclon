@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas pasadas</div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'citas.index', 'method' => 'get']) !!}
                        {!!   Form::submit('Todas las citas', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}


                            <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Localizacion</th>
                                <th>Consulta</th>



                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->medico->full_name }}</td>
                                    <td>{{ $cita->paciente->full_name}}</td>
                                    <td>{{ $cita->location->hospital}}</td>
                                    <td>{{ $cita->consulta->nombre}}</td>
                                    <td>{{ $cita->duracion}}</td>
                                    <td>{{ $cita->hora_fin}}</td>



                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection