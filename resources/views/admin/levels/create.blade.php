@extends('layouts.app')

@section('title','Agregar nivel')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Agregar Nivel</h3>
  </div>
    <div class="panel-body">
  {!! Form::open(['route'=>'levels.store','method'=>'POST'])!!}
    <div class="form-group">
      {!!Form::label('descripcion_nivel','Nombre')!!}
      {!!Form::text('descripcion_nivel',null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Nombre del nivel','required'])!!}
    </div>

    <div>
      {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
    </div>

  {!!Form::close()!!}
</div>
</div>
@endsection
