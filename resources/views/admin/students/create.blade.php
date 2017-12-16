@extends('layouts.app')

@section('title','Crear alumno')

@section('content')
  <div class="well-medium">
    <h1 class="text-center">Alumnos</h1>
  </div>


  <div class="panel panel-default" style="margin-left:10%;margin-right:10%;">
    <div class="panel-heading">
    <h3 class="panel-title">Añadir alumno</h3>
  </div>
    <div class="panel-body">

      {!! Form::open(['route'=>'students.store','method'=>'POST'])!!}

        <div class="form-group">
          {!! Form::label('nombres','Nombre(s)') !!}
          {!! Form::text('nombres',null,['class'=>'form-control','style'=>'width:35%;','placeholder'=>'Ingresar nombre(s) del alumno','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('apellidos','Apellidos') !!}
          {!! Form::text('apellidos',null,['class'=>'form-control','style'=>'width:35%;','placeholder'=>'Ingresar apellido(s) del alumno','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('numero_control','N° de control') !!}
          {!!Form::number('numero_control',null,['class'=>'form-control','style'=>'width:30%;','placeholder'=>'N° de control del alumno','required'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('carrera_id','Carrera') !!}
          {!!Form::select('carrera_id',$careers,null,['class'=>'form-control','style'=>'width:30%;','placeholder'=>'Seleccionar carrera','required'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('generacion_id','Generación') !!}
          {!!Form::select('generacion_id',$generationsPluck,null,['class'=>'form-control','style'=>'width:30%;','placeholder'=>'Seleccionar generación','required'])!!}
        </div>


        <div>
          {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
