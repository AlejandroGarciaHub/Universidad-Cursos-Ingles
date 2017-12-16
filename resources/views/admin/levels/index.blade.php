@extends('layouts.app')

@section('title','Niveles')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Niveles</h1>
  </div>

  <a href="{{route('levels.create')}}" class="btn btn-success">Añadir nivel</a>
  <hr>

  <div class="panel panel-default" style="margin-left:12%;margin-right:12%;">
    <div class="panel-heading">
    <h3 class="panel-title">Niveles </h3>
  </div>
    <div class="panel-body">

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
          <td>
            <a href="{{route('levels.edit',$level->id)}}" class="glyphicon glyphicon-pencil" style="color:green; margin-left:3%;margin-right:5%;"></a>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

</div>
</div>
@endsection
