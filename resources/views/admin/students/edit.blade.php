@extends('layouts.app')

@section('title','Editar alumno')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Alumnos</h1>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar alumno</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($student, ['method' => 'PUT', 'action' => ['StudentsController@update',$student->id]]) !!}

      <div class="form-group">
        {!! Form::label('nombres','Nombre(s)') !!}
        {!! Form::text('nombres',null,['class'=>'form-control','style'=>'width:35%;','placeholder'=>'Ingresar nombre(s) del alumno','required', 'pattern'=>'.{3,}', 'title'=>'Minimo 3 caracteres']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('apellidos','Apellidos') !!}
        {!! Form::text('apellidos',null,['class'=>'form-control','style'=>'width:35%;','placeholder'=>'Ingresar apellido(s) del alumno','required', 'pattern'=>'.{3,}', 'title'=>'Minimo 3 caracteres']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('numero_control','N° de control') !!}
        {!!Form::text('numero_control',null,['class'=>'form-control','style'=>'width:30%;','placeholder'=>'N° de control del alumno','required', 'pattern'=>'.{8,}', 'title'=>'Ingresa los 8 digitos'])!!}
      </div>

      <div class="form-group">
        {!! Form::label('carrera_id','Carrera') !!}
        {!!Form::select('carrera_id',$careers,$student->carrera_id,['class'=>'form-control','style'=>'width:30%;','placeholder'=>'Año de la generación','required'])!!}
      </div>

      <div class="form-group">
        {!! Form::label('generacion_id','Generación') !!}
        {!!Form::select('generacion_id',$generationsPluck,$student->generacion_id,['class'=>'form-control','style'=>'width:30%;','placeholder'=>'Año de la generación','required'])!!}
      </div>

        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
