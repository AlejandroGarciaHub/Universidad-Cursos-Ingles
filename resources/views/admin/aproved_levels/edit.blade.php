@extends('layouts.app')

@section('title','Editar registro de nivel aprobado')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar registro</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($aproved_level, ['method' => 'PUT', 'action' => ['Aproved_LevelsController@update',$aproved_level->id]]) !!}

      <div class="form-group">
        {!! Form::label('tipo_curso','Tipo de curso') !!}
        {!! Form::select('tipo_curso',['normal'=>'Normal','verano'=>'Verano'],$aproved_level->tipo_curso,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Ingresar nombre(s) del alumno','required']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('alumno_id','Alumno') !!}
        {!!Form::select('alumno_id',$students,$aproved_level->alumno_id,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Año de la generación','required'])!!}
      </div>

      <div class="form-group">
        {!! Form::label('calif','Calificación') !!}
        {!! Form::number('calif',null,['class'=>'form-control','style'=>'width:25%;','placeholder'=>'Califición obtenida en el nivel','required']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('calif_especial','Calificacion especial*') !!}
        {!!Form::select('calif_especial',['No'=>'Ninguna','NP'=>'No presentó','NA'=>'No asistió'],$aproved_level->calif_especial,['class'=>'form-control','style'=>'width:20%;'])!!}
      </div>

      <div class="form-group">
        {!! Form::label('nivel_id','Nivel') !!}
        {!!Form::select('nivel_id',$levels,$aproved_level->nivel_id,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Nivel aprobado','required'])!!}
      </div>

        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
