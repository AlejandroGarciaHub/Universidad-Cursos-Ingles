@extends('layouts.app')

@section('title','Grupos')

@section('content')

  <div class="well-medium">
    <h1 class="text-center">Grupos</h1>
  </div>

    <a href="{{route('groups.create')}}" class="btn btn-success">Nuevo grupo</a>

<hr>
    <ul  class="nav nav-pills" style="background-color:white; margin-right:85%;">

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
                <th>Profesor</th>
                <th>Horario</th>
                <th>Nivel</th>
              {{--  <th>Estatus</th>--}}
                @if (Auth::user()->type == 'admin')
                  <th>Editar | Eliminar</th>
                @endif
              </thead>
              <tbody>
                @foreach ($groups as $group)
                    @if ($group->estatus==$stat)

                    <tr>
                      <td>{{$group->profesor->nombres}} {{$group->profesor->apellidos}}</td>
                      <th>{{$group->hora}}</th>
                      <th>{{$group->nivel->descripcion_nivel}}</th>

{{--                      @if ($group->tipo_curso=='normal')
                        <td>Normal</td>
                      @else
                        <td>Verano</td>
                      @endif
--}}
                {{--       <td>{{$group->estatus}}</td>
                     --}}
                      </td>
                      @if (Auth::user()->type == 'admin')
                      <td><a href="{{route('groups.edit',$group->id)}}" class="glyphicon glyphicon-pencil" style="color:green ; margin-left:3%;margin-right:5%;"></a>
                        <a href="{{route('admin.groups.destroy',$group->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el grupo?')" class="glyphicon glyphicon-remove" style="color:red"></a>
                      </td>
                      @endif
                      @if ($group->estatus==true)
                        <td><button class="btn btn-success" type="button" name="button" onclick="window.location='{{ route("group_students.create")}}/{{$group->id}}'">Registrar alumno</button></td>
                      @endif
                      <td><button class="btn btn-info" type="button" name="button" onclick="window.location='{{ route("admin.group_students.calificaciones",$group->id)}}'">Ver calificaciones</button></td>
                      <td><button class="btn btn-warning" type="button" name="button" onclick="window.location='{{ route("admin.group_students.pagos",$group->id)}}'">Ver pagos</button></td>
                      @if ($group->estatus==true)
                        <td><button class="btn btn-danger" type="button" name="button" onclick="window.location='{{ route("admin.groups.cerrarGrupo",$group->id)}}'">Cerrar grupo</button></td>
                      @endif
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
