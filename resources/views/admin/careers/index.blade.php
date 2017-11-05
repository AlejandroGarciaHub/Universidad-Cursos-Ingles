@extends('layouts.app')

@section('title','Carreras')

@section('content')
  <a href="{{route('careers.create')}}" class="btn btn-info">Nueva carrera</a>

  {!!Form::open(['route'=>'careers.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
    <div class="input-group">
      {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Buscar carrera','aria-describedby'=>'search'])!!}
      <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search"></span></span>
    </div>

  {!!Form::close()!!}

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
@endsection
