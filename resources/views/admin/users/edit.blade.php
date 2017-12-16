@extends('layouts.app')

@section('title','Editar usuario')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Usuarios</h1>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Editar usuario {{$user->user}}</h3>
  </div>
    <div class="panel-body">
      {!! Form::model($user, ['method' => 'PUT', 'action' => ['UsersController@update',$user->id]]) !!}

        <div class="form-group">
          {!! Form::label('username','Usuario') !!}
          {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Nombre de usuario','required']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('email','Correo electronico') !!}
          {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ejemplo: email@email.com','required']) !!}
        </div>

{{--        <div class="form-group">
          {!! Form::label('password','Contraseña') !!}
          {!! Form::password('password',['class'=>'form-control','required']) !!}
        </div>
--}}
        <div class="form-group">
          {!! Form::label('type','Tipo') !!}
          {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],null,['placeholder'=>'Selecciona un nivel','class'=>'form-control']) !!}
        </div>

        <div>
          {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
        </div>

      {!! Form::close()!!}

    </div>
  </div>


@endsection
