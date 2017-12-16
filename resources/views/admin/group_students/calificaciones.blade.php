@extends('layouts.app')

@section('title','Alumnos del grupo')

@section('content')

{{--
    <a href="{{route('group_students.create',$grupo)}}" class="btn btn-info">Añadir alumno</a>
--}}
   <div class="col-md-12 row">
     <center><h3 class="" style="font-size:30px;">Calificaciones</h3></center>
      <h3 class="col-md-6"><b>Nivel:</b> {{$group->nivel->descripcion_nivel}}</h3> <h3 class="col-md-6 pull-right"><b>Aula:</b> {{$group->aula}}</h3>
    </div>
    <div class="col-md-12 row">
      <h3 class="col-md-6"><b>Teacher:</b> {{$group->profesor->nombres}} {{$group->profesor->apellidos}}</h3><h3 class="col-md-6 pull-right"><b>Hora:</b> {{$group->hora}}</h3>
    </div>


        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="" style="font-size:30px; margin-right:10%;"><input type="hidden" ><hr></h3>
        </div>
      <div class="panel-body">

    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>N° de control</th>
        <th>Carrera</th>
        @php
        $index=-2;
          $nivelUno=substr($group->nivel->descripcion_nivel,-5,1);
          $nivelDos=substr($group->nivel->descripcion_nivel,-1,1);
        @endphp
        <th id="uno" value="{{$nivelUno}}">Calificación N-{{$nivelUno}}</th>
        <th id="dos" value="{{$nivelDos}}">Calificación N-{{$nivelDos}}</th>


{{--    <th>Generacion</th> --}}
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
      </thead>
      <tbody>
        @foreach ($group_students as $index => $group_student)
          <tr>
            <td id="id" class="id" value="{{$group_student->id}}">{{$group_student->alumno->id}}</td>
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

{{-- Nuevos--}}

            @if (sizeof($aproved_levels_array[$index])>1)
              <td id="calif2" value="{{$aproved_levels_array[$index][1]->calif}}">{{$aproved_levels_array[$index][1]->calif}}</td>
            @else
              <td id="calif2" value="0">0</td>
            @endif

{{-- Nuevos--}}



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
  </div>
  </div>

    @section('scripts')
      <script type="text/javascript">
        $(document).click(function(){

          $('.editar').unbind().click(function(){

            var DOM=$(this).parent('td').parent('tr');
            var id=DOM.children('#id').attr('value');
            var nombres=DOM.children('#nombres').attr('value');
            var apellidos=DOM.children('#apellidos').attr('value');
            var numero_control=DOM.children('#numero_control').attr('value');
            var carrera_id=DOM.children('#carrera_id').attr('value');
            var carrera=DOM.children('#carrera').attr('value');
            var calificacion=DOM.children('#calif').attr('value');
            var calificacion2=DOM.children('#calif2').attr('value');

            console.log(id);
            console.log(nombres);
            console.log(apellidos);
            console.log(numero_control);
            console.log(carrera_id);
            console.log(carrera);
            console.log(calificacion);
            console.log(calificacion2);

            if (2==carrera_id||1==carrera_id) {
              console.log('Es verdad');
            }
            else {
              console.log('Es FALSO');
            }

            $(this).parent('td').parent('tr').replaceWith('<tr>  <td id="id" class="id" value="'+id+'">'+id+'</td><td id="nombre_completo"> <div class="form-group row"> <div id="nombres_div" class="col-md-6"> <input id="nombres" class="form-control" placeholder="" type="text" name="nombres" value="'+nombres+'"> </div><div id="apellidos_div" class="col-md-6"> <input id="apellidos" class="form-control" placeholder="" type="text" name="apellidos" value="'+apellidos+'"> </div></div></td><td><input class="form-control" id="numero_control" type="text" name="numero_control" value="'+numero_control+'"></td><td id="carreras"><select class="form-control" id="select_carreras" value="12" class="" name="carreras"> @foreach ($careers as $nombre=>$key) <option id="{{$key}}" value="{{$nombre}}">{{$nombre}}</option>  @endforeach </select></td>@if (sizeof($aproved_levels_array[$index])>0) <td ><input id="calif" class="form-control pull-right" style="width:60%;" type="text" name="calif" value="'+calificacion+'"></td>@else <td><input id="calif" class="form-control pull-right" style="width:60%;" type="text" name="calif" value="'+calificacion+'"></td>@endif @if (sizeof($aproved_levels_array[$index])>1) <td ><input id="calif2" class="form-control pull-right" style="width:60%;" type="text" name="calif2" value="'+calificacion2+'"></td>@else <td><input id="calif2" class="form-control pull-right" style="width:60%;" type="text" name="calif2" value="'+calificacion2+'"></td>@endif <td class="row"> <div class="col-md-6"> <button class="btn btn-success actualizar" type="button" name="button">Guardar</button> </div><div class="col-md-6"> <button class="btn btn-warning cancelar" type="button" name="button">Cancelar</button> </div></td></tr>');


            $('.id[value='+id+']').parent('tr').find('#select_carreras').find('option[id='+carrera_id+']').attr('selected','selected');
            var test=$('.id[value='+id+']').parent('tr').find('#select_carreras').find('option[id='+carrera_id+']').attr('value');
            console.log(test);
          });

          $('.cancelar').unbind().click(function(){

            var DOM=$(this).parent('div').parent('td').parent('tr');

            var id=DOM.children('#id').attr('value');
            var nombres=DOM.find('#nombres').attr('value');
            var apellidos=DOM.find('#apellidos').attr('value');
            var numero_control=DOM.find('#numero_control').attr('value');
            var carrera_id=DOM.find('option:selected').attr('id');
            var carrera=DOM.find('option:selected').attr('value');
            var calificacion=DOM.find('#calif').attr('value');
            var calificacion2=DOM.find('#calif2').attr('value');
            console.log(id);
            console.log(nombres);
            console.log(apellidos);
            console.log(numero_control);
            console.log(carrera_id);
            console.log(carrera);
            console.log(calificacion);
            console.log(calificacion2);

            $(this).parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" value="'+id+'">'+id+'</td><td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td><input type="hidden" id="apellidos" value="'+apellidos+'"></input> <td id="numero_control" value="'+numero_control+'">'+numero_control+'</td><input id="carrera_id" type="hidden" value="'+carrera_id+'"></input><td id="carrera" value="'+carrera+'">'+carrera+'</td><td id="calif" value="'+calificacion+'">'+calificacion+'</td> <td id="calif2" value="'+calificacion2+'">'+calificacion2+'</td> @if (Auth::user()->type=='admin') <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:3%;margin-right:5%;"></a> <a href="{{route('admin.group_students.destroy',$group_student->id)}}" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td>@endif </tr>');
          });

          $('.actualizar').unbind().click(function(){

            if(confirm('¿Estas seguro que deseas guardar los cambios?')){
              var DOM=$(this).parent('div').parent('td').parent('tr');
              var token="{{ csrf_token() }}";

              var id=DOM.children('#id').attr('value');
              var nombres=DOM.find('#nombres').val();
              var apellidos=DOM.find('#apellidos').val();
              var numero_control=DOM.find('#numero_control').val();
              var carrera_id=DOM.find('option:selected').attr('id');
              var carrera=DOM.find('option:selected').text();
              var calificacion=DOM.find('#calif').val();
              var calificacion2=DOM.find('#calif2').val();

              var uno=$('#uno').attr('value');
              var dos=$('#dos').attr('value');
              console.log(uno);
              console.log(dos);

              console.log(token);
              console.log(id);
              console.log(nombres);
              console.log(apellidos);
              console.log(numero_control);
              console.log(carrera_id);
              console.log(carrera);
              console.log(calificacion);
              console.log(calificacion2);


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
                           calificacion: calificacion,
                           calificacion2: calificacion2,
                           uno: uno,
                           dos: dos
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
                        var calificacion2=data.calificacion2;

                        console.log('AJAX');
                        console.log(id);
                        console.log(nombres);
                        console.log(apellidos);
                        console.log(numero_control);
                        console.log(carrera_id);
                        console.log(carrera);
                        console.log(calificacion);
                        console.log(calificacion2);

                        $('.actualizar').parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" value="'+id+'">'+id+'</td><td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td><input type="hidden" id="apellidos" value="'+apellidos+'"></input> <td id="numero_control" value="'+numero_control+'">'+numero_control+'</td><input id="carrera_id" type="hidden" value="'+carrera_id+'"></input><td id="carrera" value="'+carrera+'">'+carrera+'</td><td id="calif" value="'+calificacion+'">'+calificacion+'</td> <td id="calif2" value="'+calificacion2+'">'+calificacion2+'</td> @if (Auth::user()->type=='admin') <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:3%;margin-right:5%;"></a> <a href="{{route('admin.group_students.destroy',$group_student->id)}}" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td>@endif </tr>');

                        $('#13').prepend('<div class="alert alert-success" role="alert">Se han registrado los cambios</div>');

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
        $(document).on('page:change',function(){
          $(document).trigger('click');
        });

      </script>

    @endsection
@endsection
