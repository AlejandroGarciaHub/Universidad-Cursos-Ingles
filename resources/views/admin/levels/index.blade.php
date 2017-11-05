@extends('layouts.app')

@section('title','Niveles')

@section('content')
  <a href="{{route('levels.create')}}" class="btn btn-info">Nuevo nivel</a>
  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Descripción</th>
      @if (Auth::user()->type == 'admin')
        <th>Editar | Eliminar</th>
      @endif
    </thead>
    <tbody>
      @foreach ($levels as $level)
        <tr>
          <td>{{$level->id}}</td>
          <td>{{$level->descripcion_nivel}}</td>
          @if (Auth::user()->type == 'admin')
          <td><a href="{{route('levels.edit',$level->id)}}" class="glyphicon glyphicon-pencil" style="color:green; margin-left:3%;margin-right:5%;"></a>
            <a href="{{route('admin.levels.destroy',$level->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el nivel?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
