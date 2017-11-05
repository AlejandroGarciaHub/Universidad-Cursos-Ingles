@extends('layouts.app')

@section('title','Alumnos')

@section('content')

    <a href="{{route('teachers.create')}}" class="btn btn-info">Añadir teacher</a>

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
@endsection
