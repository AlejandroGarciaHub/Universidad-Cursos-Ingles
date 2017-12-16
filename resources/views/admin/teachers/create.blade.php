@extends('layouts.app')

@section('title','Agregar teacher')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Teachers</h1>
  </div>

  <div class="panel panel-default" style="margin-left:13%; margin-right:13%;">
    <div class="panel-heading">
    <h3 class="panel-title">Nuevo teacher</h3>
  </div>
    <div class="panel-body">
  {!! Form::open(['route'=>'teachers.store','method'=>'POST'])!!}
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
      {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
    </div>

  {!!Form::close()!!}
</div>
</div>
@endsection
