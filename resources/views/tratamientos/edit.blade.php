@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($tratamiento, [ 'route' => ['tratamientos.update',$tratamiento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'Fecha de inicio') !!}
                            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" value= "{{Carbon\Carbon::parse($tratamiento->hora_fin)->format('Y-m-d\Th:i')}}"/>
                        </div>

                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'Fecha de fin') !!}
                            <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control" value= "{{Carbon\Carbon::parse($tratamiento->hora_fin)->format('Y-m-d\Th:i')}}"/>
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción del tratamiento') !!}
                            {!! Form::text('descripcion',$tratamiento->descripcion,['class'=>'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}

                        <div class="form-group">
                            {!! Form::open(['route' => ['medicacions.create','id'=> $tratamiento->id], 'method' => 'get']) !!}
                            {!!   Form::submit('Añadir medicación', ['class'=> 'btn btn-warning'])!!}
                            {!! Form::close() !!}
                        </div>

                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Medicamento</th>
                                <th>Unidades</th>
                                <th>Frecuencia</th>
                                <th>Instrucciones</th>

                                <th colspan="2">Acciones</th>

                            </tr>

                            @foreach ($medicacions as $medicacion)


                                <tr>
                                    <td>{{ $medicacion->unidades }}</td>
                                    <td>{{ $medicacion->frecuencia }}</td>
                                    <td>{{ $medicacion->instrucciones}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['medicinas.edit',$medicacion->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>

                                        {!! Form::open(['route' => ['medicinas.destroy',$medicacion->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
