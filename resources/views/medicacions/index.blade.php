@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicaciones</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicacions.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear medicacion', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Tratamiento</th>
                                <th>Medicina</th>
                                <th>Unidades</th>
                                <th>Frecuencia</th>
                                <th>Instrucciones</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($medicacions as $medicacion)


                                <tr>
                                    <td>{{ $medicacion->tratamiento->descripcion }}</td>
                                    <td>{{ $medicacion->medicina->name }}</td>
                                    <td>{{ $medicacion->unidades }}</td>
                                    <td>{{ $medicacion->frecuencia }}</td>
                                    <td>{{ $medicacion->instrucciones }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['medicacions.edit',$medicacion->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicacions.destroy',$medicacion->id], 'method' => 'delete']) !!}
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