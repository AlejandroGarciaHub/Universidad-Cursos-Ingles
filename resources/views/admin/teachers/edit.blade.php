@extends('layouts.app')

@section('title','Editar teacher')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Teachers</h1>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar datos de teacher</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($teacher, ['method' => 'PUT', 'action' => ['TeachersController@update',$teacher->id]]) !!}

      <div class="form-group">
        {!! Form::label('nombres','Nombre(s)') !!}
        {!! Form::text('nombres',null,['class'=>'form-control','style'=>'width:35%;','placeholder'=>'Ingresar nombre(s) del teacher','required']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('apellidos','Apellidos') !!}
        {!! Form::text('apellidos',null,['class'=>'form-control','style'=>'width:35%;','placeholder'=>'Ingresar apellido(s) del teacher','required']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('telefono','Telefono') !!}
        {!! Form::text('telefono',null,['class'=>'form-control','style'=>'width:35%;','placeholder'=>'Numero de telefono']) !!}
      </div>


        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
