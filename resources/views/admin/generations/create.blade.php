@extends('layouts.app')

@section('title','Agregar generación')

@section('content')
  <div class="well-medium">
    <h1 class="text-center">Generaciones</h1>
  </div>

  <div class="panel panel-default" style="margin-left:15%; margin-right:15%;">
    <div class="panel-heading">
    <h3 class="panel-title">Agregar generación</h3>
  </div>
    <div class="panel-body">
  {!! Form::open(['route'=>'generations.store','method'=>'POST'])!!}
    <div class="form-group">
      {!!Form::label('year','Año')!!}
      {!!Form::number('year',null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Año de la generación','required'])!!}
    </div>

    <div>
      {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>

  {!!Form::close()!!}
</div>
</div>
@endsection
