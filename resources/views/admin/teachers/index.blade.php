@extends('layouts.app')

@section('title','Teachers')

@section('content')

<div class="well-medium">
  <h1 class="text-center">Teachers</h1>
</div>

    <a href="{{route('teachers.create')}}" class="btn btn-success">Añadir teacher</a>

<hr>
    <div class="panel panel-default" style="margin-left:10%;margin-right:10%;">
      <div class="panel-heading">
        <h3 class="panel-title">Teachers</h3>
    </div>
  <div class="panel-body">

    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Telefono</th>
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
      </thead>
      <tbody>
        @foreach ($teachers as $teacher)
          <tr>
            <td>{{$teacher->id}}</td>
            <td>{{$teacher->nombres}} {{$teacher->apellidos}}</td>
            <td>{{$teacher->telefono}}</td>
            @if (Auth::user()->type == 'admin')
            <td><a href="{{route('teachers.edit',$teacher->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
              <a href="{{route('admin.teachers.destroy',$teacher->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el teacher?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection
