@extends('layouts.app')

@section('title','Registrar calificación')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Registrar calificación de nivel</h3>
  </div>
    <div class="panel-body">

      {!! Form::open(['route'=>'aproved_levels.store','method'=>'POST'])!!}


      <div class="form-group">
        {{ Form::hidden('alumno_grupo_id', $alumno_grupo) }}
      </div>

        <div class="form-group">
          {!! Form::label('calif','Calificación') !!}
          {!! Form::number('calif',null,['class'=>'form-control','style'=>'width:25%;','placeholder'=>'Califición obtenida en el nivel','required','value'=>'']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('calif_especial','Calificacion especial*') !!}
          {!!Form::select('calif_especial',['No'=>'Ninguna','NP'=>'No presentó','NA'=>'No asistió'],null,['class'=>'form-control','style'=>'width:20%;'])!!}
        </div>

        <div>
          {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>

@endsection
