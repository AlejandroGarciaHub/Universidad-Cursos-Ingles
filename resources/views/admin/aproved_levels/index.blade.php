@extends('layouts.app')

@section('title','Registro de aprobación de niveles')

@section('content')

    <a href="{{route('aproved_levels.create')}}" class="btn btn-info">Registrar nivel acreditado</a>

    {!!Form::open(['route'=>'aproved_levels.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
      <div class="input-group">
        {!!Form::text('nombres',null,['class'=>'form-control','placeholder'=>'Buscar alumno','aria-describedby'=>'search'])!!}
        <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search"></span></span>
      </div>

    {!!Form::close()!!}

    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Alumno</th>
        <th>Calificación</th>
        <th>Calificación especial</th>
        <th>Nivel aprobado</th>
    {{--    <th>Generacion</th>
        <th>Nivel</th>--}}
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
      </thead>
      <tbody>
        @foreach ($aproved_levels as $aproved_level)
          <tr>
            <td>{{$aproved_level->id}}</td>
            <td>{{$aproved_level->student->nombres}} {{$aproved_level->student->apellidos}}</td>
            <td>{{$aproved_level->calif}}</td>
            <td>{{$aproved_level->calif_especial}}</td>
            <td>{{$aproved_level->level->descripcion_nivel}}</td>
      {{--       <td>{{$student->generation->year}}</td>
           <td>{{$student->nivel}}</td>--}}
            </td>
            @if (Auth::user()->type == 'admin')
            <td><a href="{{route('aproved_levels.edit',$aproved_level->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
              <a href="{{route('admin.aproved_levels.destroy',$aproved_level->id)}}" onclick="return confirm('¿Seguro que este registro?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection
