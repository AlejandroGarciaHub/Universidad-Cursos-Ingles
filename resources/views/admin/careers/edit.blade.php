@extends('layouts.app')

@section('title','Editar carrera')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar carrera {{$career->nombre}}</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($career, ['method' => 'PUT', 'action' => ['CareersController@update',$career->id]]) !!}

        <div class="form-group">
          {!! Form::label('nombre','Nombre') !!}
          {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de la carrera','required']) !!}
        </div>

        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
