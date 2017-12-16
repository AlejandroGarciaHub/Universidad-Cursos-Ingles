@extends('layouts.app')

@section('title','Registrar grupo')

@section('content')
  <h1 class="text-center blanco-fuente">Registro de alumno</h1>

  <div class="panel panel-default" style="margin-left:10%; margin-right:10%;">
    <div class="panel-heading">
    <h3 class="panel-title">Registrar alumno en grupo {{$grupo}}</h3>
  </div>
    <div class="panel-body">

      {!! Form::open(['route'=>'group_students.store','method'=>'POST'])!!}

      <div class="form-group">
        {{ Form::hidden('grupo_id', $grupo) }}
      </div>


        <div class="form-group">
          {!! Form::label('alumno_id','Alumno') !!}<br>
          {!! Form::select('alumno_id',$students,null,['class'=>'form-control','style'=>'width:40%;','placeholder'=>'Seleccionar alumno','required']) !!}
        </div>


        <div>
          {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
