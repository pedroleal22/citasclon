@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar consulta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($consulta, [ 'route' => ['consultas.update',$consulta->id], 'method'=>'PUT']) !!}


                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre de la consulta') !!}
                            {!! Form::text('nombre',$consulta->nombre,['class'=>'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection