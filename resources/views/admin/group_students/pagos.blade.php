@extends('layouts.app')

@section('title','Pagos del grupo')

@section('content')

{{--
    <a href="{{route('group_students.create',$grupo)}}" class="btn btn-info">Añadir alumno</a>
--}}

    <div class="col-md-12 row">
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

        <th>Pago 1</th>
        <th>Pago 2</th>
        <th>Pago 3</th>
        <th>Pagado</th>

{{--    <th>Generacion</th> --}}
        @if (Auth::user()->type == 'admin')
          <th>Editar | Eliminar</th>
        @endif
      </thead>
      <tbody>
        @foreach ($group_students as $index => $group_student)

          @php
            $pagado=0;
          @endphp
          <tr>
            <td id="id" class="id" value="{{$group_student->id}}">{{$group_student->alumno->id}}</td>
            <td id="nombres" value="{{$group_student->alumno->nombres}}"> {{$group_student->alumno->nombres}} {{$group_student->alumno->apellidos}}</td>
            <input type="hidden" id="apellidos" value="{{$group_student->alumno->apellidos}}"></input>
            <td id="numero_control" value="{{$group_student->alumno->numero_control}}">{{$group_student->alumno->numero_control}}</td>

            @if (sizeof($pagos_array[$index])>0)
              <td id="pago1" value="{{$pagos_array[$index][0]->monto}}">{{$pagos_array[$index][0]->monto}}</td>
              @php
                $pagado+=$pagos_array[$index][0]->monto;
              @endphp
            @else
              <td id="pago1" value="0">0</td>
            @endif


{{-- Nuevos--}}

@if (sizeof($pagos_array[$index])>1)
  <td id="pago2" value="{{$pagos_array[$index][1]->monto}}">{{$pagos_array[$index][1]->monto}}</td>
  @php
    $pagado+=$pagos_array[$index][1]->monto;
  @endphp
@else
  <td id="pago2" value="0">0</td>
@endif

@if (sizeof($pagos_array[$index])>2)
  <td id="pago3" value="{{$pagos_array[$index][2]->monto}}">{{$pagos_array[$index][2]->monto}}</td>
  @php
    $pagado+=$pagos_array[$index][2]->monto;
  @endphp
@else
  <td id="pago3" value="0">0</td>
@endif


<td id="pagado" value="{{$pagado}}">${{$pagado}}</td>

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

              var pago1=DOM.children('#pago1').attr('value');
              var pago2=DOM.children('#pago2').attr('value');
              var pago3=DOM.children('#pago3').attr('value');
              var pagado=DOM.children('#pagado').attr('value');

              console.log(id);
              console.log(nombres);
              console.log(apellidos);
              console.log(numero_control);

              console.log(pago1);
              console.log(pago2);
              console.log(pago3);
              console.log(pagado);


              $(this).parent('td').parent('tr').replaceWith('<tr> <td id="id" class="id" value="'+id+'">'+id+'</td> <td id="nombre_completo"> <div class="form-group row"> <div id="nombres_div" class="col-md-6"> <input id="nombres" class="form-control" placeholder="" type="text" name="nombres" value="'+nombres+'"> </div> <div id="apellidos_div" class="col-md-6"> <input id="apellidos" class="form-control" placeholder="" type="text" name="apellidos" value="'+apellidos+'"> </div> </div> </td> <td> <input class="form-control" id="numero_control" type="text" name="numero_control" value="'+numero_control+'"> </td> <td> <input class="form-control" id="pago1" type="text" name="pago1" value="'+pago1+'"> </td> <td> <input class="form-control" id="pago2" type="text" name="pago2" value="'+pago2+'"> </td> <td> <input class="form-control" id="pago3" type="text" name="pago3" value="'+pago3+'"> </td> <td id="pagado" value="'+pagado+'">'+pagado+'</td> <td> <div class=""> <button class="btn btn-success actualizar" type="button" name="button">Guardar </button> </div> <div class=""> <button class="btn btn-warning cancelar" type="button" name="button">Cancelar </button> </div> </td></tr>');


            });


            $('.cancelar').unbind().click(function(){

              var DOM=$(this).parent('div').parent('td').parent('tr');

              var id=DOM.children('#id').attr('value');
              var nombres=DOM.find('#nombres').attr('value');
              var apellidos=DOM.find('#apellidos').attr('value');
              var numero_control=DOM.find('#numero_control').attr('value');


              var pago1=DOM.find('#pago1').attr('value');
              var pago2=DOM.find('#pago2').attr('value');
              var pago3=DOM.find('#pago3').attr('value');
              var pagado=DOM.find('#pagado').attr('value');




              console.log(id);
              console.log(nombres);
              console.log(apellidos);
              console.log(numero_control);

              console.log(pago1);
              console.log(pago2);
              console.log(pago3);
              console.log(pagado);

              $(this).parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" class="id" value="'+id+'">'+id+'</td> <td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td> <input type="hidden" id="apellidos" value="'+apellidos+'"> </input> <td id="numero_control" value="'+numero_control+'">'+numero_control+' </td> <td id="pago1" value="'+pago1+'">'+pago1+'</td> <td id="pago2" value="'+pago2+'">'+pago2+'</td> <td id="pago3" value="'+pago3+'">'+pago3+'</td> <td id="pagado" value="'+pagado+'">'+pagado+'</td> @if (Auth::user()->type == 'admin') <td><a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:3%;margin-right:5%;"></a> <a href="/admin/students/'+id+'/destroy" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td> @endif</tr>');
            });

            $('.actualizar').unbind().click(function(){

              if(confirm('¿Estas seguro que deseas guardar los cambios?')){
                var DOM=$(this).parent('div').parent('td').parent('tr');
                var token="{{ csrf_token() }}";

                var id=DOM.children('#id').attr('value');
                var nombres=DOM.find('#nombres').val();
                var apellidos=DOM.find('#apellidos').val();
                var numero_control=DOM.find('#numero_control').val();

                var pago1=DOM.find('#pago1').val();
                var pago2=DOM.find('#pago2').val();
                var pago3=DOM.find('#pago3').val();
                var pagado=DOM.find('#pagado').attr('value');

//                var pagado=DOM.children('#pagado').attr('value');

              if (pagado=='') {
                pagado=0;
              }


                console.log(token);
                console.log(id);
                console.log(nombres);
                console.log(apellidos);
                console.log(numero_control);

                console.log(pago1);
                console.log(pago2);
                console.log(pago3);
                console.log(pagado);



                $.ajax({
                        url: "{{ URL::to('/admin/group_students/actualizar_pago') }}"+"/"+id,
                        method:"GET",
                        data:{
                            _token: token,
                             id: id,
                             nombres: nombres,
                             apellidos: apellidos,
                             numero_control: numero_control,
                             pago1: pago1,
                             pago2: pago2,
                             pago3: pago3,
                             pagado: pagado
                      },
                      success: function( data ) {
                        console.log('Success!!');
                        console.log(data);


                          var id=data.id;
                          var nombres=data.nombres;
                          var apellidos=data.apellidos;
                          var numero_control=data.numero_control;
                          var pago1=data.pago1;
                          var pago2=data.pago2;
                          var pago3=data.pago3;
                          var pagado=data.pagado;


                          console.log('AJAX');
                          console.log(id);
                          console.log(nombres);
                          console.log(apellidos);
                          console.log(numero_control);

                          console.log(pago1);
                          console.log(pago2);
                          console.log(pago3);
                          console.log(pagado);



                        $('.actualizar').parent('div').parent('td').parent('tr').replaceWith('<tr> <td id="id" value="'+id+'">'+id+'</td> <td id="nombres" value="'+nombres+'">'+nombres+' '+apellidos+'</td> <input type="hidden" id="apellidos" value="'+apellidos+'"></input> <td id="numero_control" value="'+numero_control+'">'+numero_control+'</td> <td id="pago1" value="'+pago1+'">'+pago1+'</td> <td id="pago2" value="'+pago2+'">'+pago2+'</td> <td id="pago3" value="'+pago3+'">'+pago3+'</td> <td id="pagado" value="'+pagado+'">'+pagado+'</td> @if (Auth::user()->type=='admin') <td> <a href="#" class="glyphicon glyphicon-pencil editar" style="color:green ; margin-left:3%;margin-right:5%;"></a> <a href="/admin/group_students/'+id+'/destroy" onclick="return confirm("¿Seguro que deseas eliminar el usuario?")" class="glyphicon glyphicon-remove" style="color:red"></a> </td> @endif </tr>');


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
