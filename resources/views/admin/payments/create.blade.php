@extends('layouts.app')

@section('title','Registrar pago')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Registrar pago</h3>
  </div>
    <div class="panel-body">
  {!! Form::open(['route'=>'payments.store','method'=>'POST'])!!}

    <div class="form-group">
      {!!Form::label('alumno_id','Alumno')!!}
      {!!Form::select('alumno_id',$students,null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Seleccionar alumno','required'])!!}
    </div>

    <div class="form-group">
      {!!Form::label('nivel_id','Nivel')!!}
      {!!Form::select('nivel_id',$levels,null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Seleccionar nivel','required'])!!}
    </div>

    <div class="form-group">
      {!!Form::label('monto','Monto a pagar')!!}
      ${!!Form::number('monto',null,['class'=>'form-control','style'=>'width:20%;','placeholder'=>'Monto del pago','required'])!!}
    </div>

    <div>
      {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
    </div>

  {!!Form::close()!!}
</div>
</div>
@endsection
