@extends('layouts.app')

@section('title','Alumnos')

@section('content')

    <a href="{{route('groups.create')}}" class="btn btn-info">Nuevo grupo</a>

    <span class="">
      {!!Form::open(['route'=>'groups.index','method'=>'GET','class'=>'form-inline pull-right'])!!}
          {!!Form::text('nombres',null,['class'=>'form-control mr-sm-2','placeholder'=>'Buscar alumno','aria-label'=>'search'])!!}
          {!!Form::submit('Buscar',['class'=>'btn btn-outline-success my-2 my-sm-0y']) !!}
      {!!Form::close()!!}
    </span><hr>

    <ul  class="nav nav-pills">

      <li class="active">
        <a href="#abiertos" data-toggle="tab">Abiertos</a>
      </li>
        <li>
          <a  href="#cerrados" data-toggle="tab">Cerrados</a>
        </li>
    </ul><br>

    <div class="panel panel-default">
      <div class="panel-heading">
      <h3 class="panel-title">Grupos <section value="" class="pull-right">
      </section></h3>
    </div>
    <div class="panel-body">
        <div class="tab-content clearfix">

          @foreach ([false,true] as $stat)
            @if ($stat==true)
              @php
              $estatus_grupo="abiertos";
              @endphp
              <div class="tab-pane active" id="{{$estatus_grupo}}">
              @else
                @php
                $estatus_grupo="cerrados";
                @endphp
                <div class="tab-pane" id="{{$estatus_grupo}}">
            @endif

            <table class="table table-striped">
              <thead>
                <th>ID</th>
                <th>Nivel</th>
                <th>Profesor</th>
                <th>Aula</th>
                <th>Tipo de Curso</th>
              {{--  <th>Estatus</th>--}}
                @if (Auth::user()->type == 'admin')
                  <th>Editar | Eliminar</th>
                @endif
              </thead>
              <tbody>
                @foreach ($groups as $group)
                    @if ($group->estatus==$stat)

                    <tr>
                      <td>{{$group->id}}</td>
                      <td>{{$group->nivel->descripcion_nivel}}</td>
                      <td>{{$group->profesor->nombres}} {{$group->profesor->apellidos}}</td>
                      <td>{{$group->aula}}</td>
                      @if ($group->tipo_curso=='normal')
                        <td>Normal</td>
                      @else
                        <td>Verano</td>
                      @endif
                {{--       <td>{{$group->estatus}}</td>
                     --}}
                      </td>
                      @if (Auth::user()->type == 'admin')
                      <td><a href="{{route('groups.edit',$group->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
                        <a href="{{route('admin.groups.destroy',$group->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el grupo?')" class="glyphicon glyphicon-remove" style="color:red"></a>
                      </td>
                      @endif
                      <td><button class="btn btn-success" type="button" name="button" onclick="window.location='{{ route("group_students.create")}}/{{$group->id}}'">Registrar alumno</button></td>
                      <td><button class="btn btn-success" type="button" name="button" onclick="window.location='{{ route("admin.group_students.calificaciones",$group->id)}}'">Ver calificaciones</button></td>
                      <td><button class="btn btn-success" type="button" name="button" onclick="window.location='{{ route("admin.group_students.pagos",$group->id)}}'">Ver pagos</button></td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>

        @endforeach


        </div>
    </div>
  </div>

@endsection
