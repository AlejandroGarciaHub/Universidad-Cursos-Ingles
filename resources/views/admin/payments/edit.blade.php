@extends('layouts.app')

@section('title','Editar Pago')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar pago</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($payment, ['method' => 'PUT', 'action' => ['PaymentsController@update',$payment->id]]) !!}

      <div class="form-group">
        {!!Form::label('alumno_id','Alumno')!!}
        {!!Form::select('alumno_id',$students,$payment->alumno_id,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Seleccionar alumno','required'])!!}
      </div>

      <div class="form-group">
        {!!Form::label('nivel_id','Nivel')!!}
        {!!Form::select('nivel_id',$levels,$payment->nivel_id,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Seleccionar nivel','required'])!!}
      </div>

      <div class="form-group">
        {!!Form::label('monto','Monto a pagar')!!}
        ${!!Form::number('monto',null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Monto del pago','required'])!!}
      </div>

        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
