@extends('layouts.app')

@section('title','Usuarios registrados')

@section('content')

    <a href="{{route('users.create')}}" class="btn btn-info">Nuevo usuario</a>
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
@endsection
