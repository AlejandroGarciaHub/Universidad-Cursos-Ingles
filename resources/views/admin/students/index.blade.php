@extends('layouts.app')

@section('title','Alumnos')

@section('content')

    <a href="{{route('students.create')}}" class="btn btn-info">Nuevo alumno</a>

    <span class="">
      {!!Form::open(['route'=>'students.index','method'=>'GET','class'=>'form-inline pull-right'])!!}
          {!!Form::text('nombres',null,['class'=>'form-control mr-sm-2','placeholder'=>'Buscar alumno','aria-label'=>'search'])!!}
          {!!Form::submit('Buscar',['class'=>'btn btn-outline-success my-2 my-sm-0y']) !!}
      {!!Form::close()!!}
    </span><hr>

    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>N° de control</th>
        <th>Carrera</th>
        <th>U 1-2</th>
        <th>U 3-4</th>
        <th>U 5-6</th>
        <th>U 7-8</th>
        <th>Promedio</th>
        {{-- <th>Generacion</th> --}}
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
      </thead>
      <tbody>
        @foreach ($students as $index => $student)
          <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->nombres}} {{$student->apellidos}}</td>
            <td>{{$student->numero_control}}</td>
            <td>{{$student->career->nombre}}</td>
{{--             <td>{{$student->generation->year}}</td> --}}

            @php
              $numerador=0;
              $denominador=0;
            @endphp
               @for ($i=1; $i < 5; $i++)
                 @if (sizeof($aproved_levels_array[$index])>0)
                 @foreach ($aproved_levels_array[$index] as $aproved_level)
                   @if ($aproved_level->alumno_grupo->grupo->nivel->id==$i)
                     @php
                       $numerador+=$aproved_level->calif;
                       $denominador++;
                     @endphp
                     <td>{{$aproved_level->calif}}</td>
                     @else
                       <td>0</td>
                   @endif
                 @endforeach
               @else
                 <td>0</td>

               @endif

               @endfor

               @if ($denominador>0)
                 @php
                   $promedio=$numerador/$denominador;
                 @endphp
                 <td value="0">{{$promedio}}</td>
                 @else
                   <td>0</td>
               @endif

      {{--     <td>{{$student->nivel}}</td>--}}
            @if (Auth::user()->type == 'admin')
            <td><a href="{{route('students.edit',$student->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
              <a href="{{route('admin.students.destroy',$student->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el usuario?')" class="glyphicon glyphicon-remove" style="color:red"></a></td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection
