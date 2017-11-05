@extends('layouts.app')

@section('title','Agregar teacher')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Nuevo teacher</h3>
  </div>
    <div class="panel-body">
  {!! Form::open(['route'=>'teachers.store','method'=>'POST'])!!}
  <div class="form-group">
    {!! Form::label('nombres','Nombre(s)') !!}
    {!! Form::text('nombres',null,['class'=>'form-control','style'=>'width:25%;','placeholder'=>'Ingresar nombre(s) del teacher','required']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('apellidos','Apellidos') !!}
    {!! Form::text('apellidos',null,['class'=>'form-control','style'=>'width:25%;','placeholder'=>'Ingresar apellido(s) del teacher','required']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('telefono','Telefono') !!}
    {!! Form::text('telefono',null,['class'=>'form-control','style'=>'width:25%;','placeholder'=>'Numero de telefono']) !!}
  </div>

    <div>
      {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
    </div>

  {!!Form::close()!!}
</div>
</div>
@endsection
