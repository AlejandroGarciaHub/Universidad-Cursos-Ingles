@extends('layouts.app')

@section('title','Editar generación')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar generación {{$generation->year}}</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($generation, ['method' => 'PUT', 'action' => ['GenerationsController@update',$generation->id]]) !!}

        <div class="form-group">
          {!! Form::label('year','Año') !!}
          {!! Form::text('year',null,['class'=>'form-control','placeholder'=>'Año de la generación','required']) !!}
        </div>

        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
