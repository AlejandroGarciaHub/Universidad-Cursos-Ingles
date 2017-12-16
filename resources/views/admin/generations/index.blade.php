@extends('layouts.app')

@section('title','Generaciones')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Generaciones</h1>
  </div>

  <a href="{{route('generations.create')}}" class="btn btn-success">Añadir generación</a>
  <hr>

  <div class="panel panel-default" style="margin-left:10%; margin-right:15%;">
    <div class="panel-heading">
      <h3 class="panel-title">Generaciones</h3>
  </div>
<div class="panel-body">

  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Año</th>
      @if (Auth::user()->type == 'admin')
        <th>Editar | Eliminar</th>
      @endif
    </thead>
    <tbody>
      @foreach ($generations as $generation)
        <tr>
          <td>{{$generation->id}}</td>
          <td>{{$generation->year}}</td>
          @if (Auth::user()->type == 'admin')
          <td><a href="{{route('generations.edit',$generation->id)}}" class="glyphicon glyphicon-pencil" style="color:green; margin-left:3%;margin-right:5%;"></a>
            <a href="{{route('admin.generations.destroy',$generation->id)}}" onclick="return confirm('¿Seguro que deseas eliminar la generacion?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

</div>
</div>
@endsection
