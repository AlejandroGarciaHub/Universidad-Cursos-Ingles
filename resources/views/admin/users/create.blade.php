@extends('layouts.app')

@section('title','Crear usuario')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Usuarios</h1>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Crear usuario</h3>
  </div>
    <div class="panel-body">

      {!! Form::open(['route'=>'users.store','method'=>'POST'])!!}

        <div class="form-group">
          {!! Form::label('username','Usuario') !!}
          {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Nombre de usuario','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('email','Correo electronico') !!}
          {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ejemplo: email@email.com','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('password','Contraseña') !!}
          {!! Form::password('password',['class'=>'form-control','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('type','Tipo') !!}
          {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],null,['placeholder'=>'Selecciona un nivel','class'=>'form-control']) !!}
        </div>

        <div>
          {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
