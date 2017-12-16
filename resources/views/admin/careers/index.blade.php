@extends('layouts.app')

@section('title','Carreras')

@section('content')
  <div class="well-medium">
    <h1 class="text-center">Carreras</h1>
  </div>

  <a href="{{route('careers.create')}}" class="btn btn-success">Añadir carrera</a>

  <hr>

  <div class="panel panel-default" style="margin-left:10%; margin-right:10%;">
    <div class="panel-heading">
    <h3 class="panel-title">Carreras</h3>
  </div>
    <div class="panel-body">

  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Nombre</th>
      @if (Auth::user()->type == 'admin')
        <th>Editar | Eliminar</th>
      @endif
    </thead>
    <tbody>
      @foreach ($careers as $career)
        <tr>
          <td>{{$career->id}}</td>
          <td>{{$career->nombre}}</td>
          @if (Auth::user()->type == 'admin')
          <td><a href="{{route('careers.edit',$career->id)}}" class="glyphicon glyphicon-pencil" style="color:green; margin-left:3%;margin-right:5%;"></a>
            <a href="{{route('admin.careers.destroy',$career->id)}}" onclick="return confirm('¿Seguro que deseas eliminar la carrera?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

</div>
</div>
@endsection
