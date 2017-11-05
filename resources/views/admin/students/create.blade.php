@extends('layouts.app')

@section('title','Crear usuario')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Añadir alumno</h3>
  </div>
    <div class="panel-body">

      {!! Form::open(['route'=>'students.store','method'=>'POST'])!!}

        <div class="form-group">
          {!! Form::label('nombres','Nombre(s)') !!}
          {!! Form::text('nombres',null,['class'=>'form-control','style'=>'width:25%;','placeholder'=>'Ingresar nombre(s) del alumno','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('apellidos','Apellidos') !!}
          {!! Form::text('apellidos',null,['class'=>'form-control','style'=>'width:25%;','placeholder'=>'Ingresar apellido(s) del alumno','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('numero_control','N° de control') !!}
          {!!Form::number('numero_control',null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'N° de control del alumno','required'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('carrera_id','Carrera') !!}
          {!!Form::select('carrera_id',$careers,null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Seleccionar carrera','required'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('generacion_id','Generación') !!}
          {!!Form::select('generacion_id',$generationsPluck,null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Seleccionar generación','required'])!!}
        </div>


        <div>
          {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
