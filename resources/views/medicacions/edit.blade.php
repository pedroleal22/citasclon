@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medicacion</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicacion, [ 'route' => ['medicacions.update',$medicacion->id], 'method'=>'PUT']) !!}


                        <div class="form-group">
                            {!!Form::label('tratamiento_id', 'Tratamiento') !!}
                            <br>
                            {!! Form::select('tratamiento_id', $tratamientos, $medicacion->tratamiento_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medicina_id', 'Medicina') !!}
                            <br>
                            {!! Form::select('medicina_id', $medicinas, $medicacion->medicina_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('unidades', 'Unidades') !!}
                            {!! Form::text('unidades',$medicacion->unidades,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuencia', 'Frecuencia') !!}
                            {!! Form::text('frecuencia',$medicacion->frecuencia,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('instrucciones', 'Instrucciones') !!}
                            {!! Form::text('instrucciones',$medicacion->instrucciones,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
