
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tratamientos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'tratamientos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear tratamiento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th>Descripción</th>


                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($tratamientos as $tratamiento)


                                <tr>
                                    <td>{{ $tratamiento->fecha_inicio}}</td>
                                    <td>{{ $tratamiento->fecha_fin}}</td>
                                    <td>{{ $tratamiento->descripcion}}</td>



                                    <td>
                                        {!! Form::open(['route' => ['tratamientos.edit',$tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                    <td>
                                        {!! Form::open(['route' => ['medicacion.findByTratamiento',$tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Medicación', ['class'=> 'btn btn-success'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                    <td>
                                        {!! Form::open(['route' => ['tratamientos.destroy',$tratamiento->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}
                                    </td>


                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection