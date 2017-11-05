@extends('layouts.app')

@section('title','Editar nivel')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar nivel {{$level->year}}</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($level, ['method' => 'PUT', 'action' => ['LevelsController@update',$level->id]]) !!}

        <div class="form-group">
          {!! Form::label('descripcion_nivel','Nombre') !!}
          {!! Form::text('descripcion_nivel',null,['class'=>'form-control','placeholder'=>'Nombre del nivel','required']) !!}
        </div>

        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
