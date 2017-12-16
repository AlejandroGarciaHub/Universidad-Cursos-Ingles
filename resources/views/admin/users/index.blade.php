@extends('layouts.app')

@section('title','Usuarios registrados')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Usuarios</h1>
  </div>


    <a href="{{route('users.create')}}" class="btn btn-success">Nuevo usuario</a>

<hr>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Usuarios</h3>
        </div>
      <div class="panel-body">

    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Usuario</th>
        <th>Email</th>
        <th>Tipo</th>
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>
            @if ($user->type=='admin')
              <span class="label label-danger">{{$user->type}}</span>
            @else
              <span class="label label-primary">{{$user->type}}</span>

            @endif
            </td>
            @if (Auth::user()->type == 'admin')
              <td><a href="{{route('users.edit',$user->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
                <a href="{{route('admin.users.destroy',$user->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el usuario?')" class="glyphicon glyphicon-remove" style="color:red"></a>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection
