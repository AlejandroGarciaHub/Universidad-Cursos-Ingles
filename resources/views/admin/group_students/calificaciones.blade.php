@extends('layouts.app')

@section('title','Alumnos del grupo')

@section('content')

{{--
    <a href="{{route('group_students.create',$grupo)}}" class="btn btn-info">Añadir alumno</a>
--}}

    <span class="">
      {!!Form::open(['route'=>['admin.group_students.calificaciones',$grupo],'method'=>'GET','class'=>'form-inline pull-right'])!!}
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
        <th>Calificación</th>


{{--    <th>Generacion</th> --}}
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
      </thead>
      <tbody>
        @foreach ($group_students as $index => $group_student)
          <tr>
            <td id="id" value="{{$group_student->alumno->id}}">{{$group_student->alumno->id}}</td>
            <td id="nombres" value="{{$group_student->alumno->nombres}}"> {{$group_student->alumno->nombres}} {{$group_student->alumno->apellidos}}</td>
            <input type="hidden" id="apellidos" value="{{$group_student->alumno->apellidos}}"></input>
            <td id="numero_control" value="{{$group_student->alumno->numero_control}}">{{$group_student->alumno->numero_control}}</td>
            <input id="carrera_id" type="hidden" type="text" name="" value="{{$group_student->alumno->career->id}}">
            <td id="carrera" value="{{$group_student->alumno->career->nombre}}">{{$group_student->alumno->career->nombre}}</td>

            @if (sizeof($aproved_levels_array[$index])>0)
              <td id="calif" value="{{$aproved_levels_array[$index][0]->calif}}">{{$aproved_levels_array[$index][0]->calif}}</td>
            @else
              <td id="calif" value="0">0</td>
            @endif

      {{--  <td>{{$student->generation->year}}</td>  --}}
            </td>
            @if (Auth::user()->type == 'admin')
            <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:3%;margin-right:5%;"></a>
              <a href="{{route('admin.group_students.destroy',$group_student->id)}}" onclick="return confirm('¿Seguro que deseas eliminar el usuario?')" class="glyphicon glyphicon-remove" style="color:red"></a>
            </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
    @section('scripts')
      <script type="text/javascript">
        $(document).click(function(){

          $('.editar').click(function(){

            var DOM=$(this).parent('td').parent('tr');
            var id=DOM.children('#id').attr('value');
            var nombres=DOM.children('#nombres').attr('value');
            var apellidos=DOM.children('#apellidos').attr('value');
            var numero_control=DOM.children('#numero_control').attr('value');
            var carrera_id=DOM.children('#carrera_id').attr('value');
            var carrera=DOM.children('#carrera').attr('value');
            var calificacion=DOM.children('#calif').attr('value');
            console.log(id);
            console.log(nombres);
            console.log(apellidos);
            console.log(numero_control);
            console.log(carrera_id);
            console.log(carrera);
            console.log(calificacion);
            $(this).parent('td').parent('tr').replaceWith('<tr>  <td id="id" value="'+id+'">'+id+'</td><td id="nombre_completo"> <div class="form-group row"> <div id="nombres_div" class="col-md-6"> <input id="nombres" class="form-control" placeholder="" type="text" name="nombres" value="'+nombres+'"> </div><div id="apellidos_div" class="col-md-6"> <input id="apellidos" class="form-control" placeholder="" type="text" name="apellidos" value="'+apellidos+'"> </div></div></td><td><input class="form-control" id="numero_control" type="text" name="numero_control" value="'+numero_control+'"></td><td><select class="form-control" id="carreras" class="" name="carreras"> @foreach ($careers as $id=>$career) @if ($id==$group_student->alumno->career->id) <option id="{{$id}}" selected="selected" value="'+carrera+'">{{$career}}</option> @else <option id="{{$id}}" value="'+carrera+'">{{$career}}</option> @endif @endforeach </select></td>@if (sizeof($aproved_levels_array[$index])>0) <td ><input id="calif" class="form-control pull-right" style="width:60%;" type="text" name="calif" value="'+calificacion+'"></td>@else <td><input id="calif" class="form-control pull-right" style="width:60%;" type="text" name="calif" value="'+calificacion+'"></td>@endif <td class="row"> <div class="col-md-6"> <button class="btn btn-success actualizar" type="button" name="button">Guardar</button> </div><div class="col-md-6"> <button class="btn btn-warning cancelar" type="button" name="button">Cancelar</button> </div></td></tr>');
          });

          $('.cancelar').click(function(){

            var DOM=$(this).parent('div').parent('td').parent('tr');

            var id=DOM.children('#id').attr('value');
            var nombres=DOM.find('#nombres').attr('value');
            var apellidos=DOM.find('#apellidos').attr('value');
            var numero_control=DOM.find('#numero_control').attr('value');
            var carrera_id=DOM.find('option:selected').attr('id');
            var carrera=DOM.find('option:selected').attr('value');
            var calificacion=DOM.find('#calif').attr('value');
            console.log(id);
            console.log(nombres);
            console.log(apellidos);
            console.log(numero_control);
            console.log(carrera_id);
            console.log(carrera);
            console.log(calificacion);

            $(this).parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" value="'+id+'">'+id+'</td><td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td><input type="hidden" id="apellidos" value="'+apellidos+'"></input> <td id="numero_control" value="'+numero_control+'">'+numero_control+'</td><input id="carrera_id" type="hidden" value="'+carrera_id+'"></input><td id="carrera" value="'+carrera+'">'+carrera+'</td><td id="calif" value="'+calificacion+'">'+calificacion+'</td> @if (Auth::user()->type=='admin') <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:3%;margin-right:5%;"></a> <a href="{{route('admin.group_students.destroy',$group_student->id)}}" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td>@endif </tr>');
          });

          $('.actualizar').unbind().click(function(){

            if(confirm('Are you sure your want to delete?')){
              var DOM=$(this).parent('div').parent('td').parent('tr');
              var token="{{ csrf_token() }}";

              var id=DOM.children('#id').attr('value');
              var nombres=DOM.find('#nombres').val();
              var apellidos=DOM.find('#apellidos').val();
              var numero_control=DOM.find('#numero_control').val();
              var carrera_id=DOM.find('option:selected').attr('id');
              var carrera=DOM.find('option:selected').text();
              var calificacion=DOM.find('#calif').val();
              console.log(token);
              console.log(id);
              console.log(nombres);
              console.log(apellidos);
              console.log(numero_control);
              console.log(carrera_id);
              console.log(carrera);
              console.log(calificacion);


              $.ajax({
                      url: "{{ URL::to('/admin/group_students/actualizar') }}"+"/"+id,
                      method:"GET",
                      data:{
                          _token: token,
                           id: id,
                           nombres: nombres,
                           apellidos: apellidos,
                           numero_control: numero_control,
                           carrera_id: carrera_id,
                           carrera: carrera,
                           calificacion: calificacion
                    },
                    success: function( data ) {
                      console.log('Success!!');
                      console.log(data);


                        var id=data.id;
                        var nombres=data.nombres;
                        var apellidos=data.apellidos;
                        var numero_control=data.numero_control;
                        var carrera_id=data.carrera_id;
                        var carrera=data.carrera;
                        var calificacion=data.calificacion;

                        $('.actualizar').parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" value="'+id+'">'+id+'</td><td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td><input type="hidden" id="apellidos" value="'+apellidos+'"></input> <td id="numero_control" value="'+numero_control+'">'+numero_control+'</td><input id="carrera_id" type="hidden" value="'+carrera_id+'"></input><td id="carrera" value="'+carrera+'">'+carrera+'</td><td id="calif" value="'+calificacion+'">'+calificacion+'</td> @if (Auth::user()->type=='admin') <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:3%;margin-right:5%;"></a> <a href="{{route('admin.group_students.destroy',$group_student->id)}}" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td>@endif </tr>');

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                      console.log('ERROR');
                      console.log(data);
                      alert(xhr.status);
                      alert(thrownError);
                    }

                });
            }


          });


        });

        $(document).ready(function(){
          $(document).trigger('click');
        });

      </script>

    @endsection
@endsection
