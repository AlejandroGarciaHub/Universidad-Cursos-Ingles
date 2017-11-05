@extends('layouts.app')

@section('title','Agregar generación')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Agregar carrera</h3>
  </div>
    <div class="panel-body">
  {!! Form::open(['route'=>'careers.store','method'=>'POST'])!!}
    <div class="form-group">
      {!!Form::label('nombre','Carrera')!!}
      {!!Form::text('nombre',null,['class'=>'form-control','style'=>'width:30%;','placeholder'=>'Nombre de la carrera nueva','required'])!!}
    </div>

    <div>
      {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
    </div>

  {!!Form::close()!!}
</div>
</div>
@endsection
