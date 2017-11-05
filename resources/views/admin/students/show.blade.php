@extends('layouts.app')

@section('title','Editar nivel')

@section('content')
  <div role="tabpanel" class="tab-pane active container-fluid" id="home">
           <div class="row">
               <div class="col-md-6">
                 <div class="panel panel-primary">
                   <div class="panel-heading">
                     <h3 class="panel-title">Datos del alumno</h3>
                   </div>
                   <div class="panel-body">

                     <div class="row">
                       <div class="col-md-4">
                         {!! Form::label('nombres','Nombre(s)') !!}
                         {!! Form::text('nombres', $student->nombres, ['class' => 'form-control', 'readonly' => 'true']) !!}
                       </div>
                       <div class="col-md-4">
                         {!! Form::label('apellidos','Apellidos') !!}
                         {!! Form::text('apellidos', $student->apellidos, ['class' => 'form-control', 'readonly' => 'true']) !!}
                       </div>
                       <div class="col-md-4">
                         {!! Form::label('numero_control','Numero de control') !!}
                         {!! Form::text('numero_control', $student->numero_control, ['class' => 'form-control', 'readonly' => 'true']) !!}
                       </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-8">
                        {!! Form::label('carrera_id','Carrera') !!}
                        {!! Form::text('carrera_id', $student->career->nombre, ['class' => 'form-control', 'readonly' => 'true']) !!}
                      </div>
                      <div class="col-md-4">
                        {!! Form::label('generacion_id','Generación') !!}
                        {!! Form::text('generacion_id', $student->generation->year, ['class' => 'form-control', 'readonly' => 'true']) !!}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                     <div class="col-md-4">
                       {!! Form::label('promedio','Promedio') !!}
                       {!! Form::text('promedio', $student->promedio, ['class' => 'form-control', 'readonly' => 'true']) !!}
                     </div>
                     <div class="col-md-5 pull-right">
                       {!! Form::label('constancia_expedida','Constancia Expedida',['class'=>'pull-right']) !!}
                        @php
                        $var='';
                        @endphp
                         @if ($student->constancia_expedida==true)
                           @php
                           $var='SI';
                           @endphp
                         @else
                           @php
                           $var='NO';
                           @endphp
                        @endif
                        <div class="pull-right col-md-8">
                          {!! Form::text('constancia_expedida', $var, ['class' => 'form-control', 'disabled' => 'true']) !!}
                        </div>
                     </div>
                  </div>

                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="panel panel-primary">
                     <div class="panel-heading">
                       <h3 class="panel-title">Pagos</h3>
                     </div>
                     <div class="panel-body">
                       <div class="col-md-8">
                         <div class="row">
                           <p class="p_inline text-center"><b>NIVEL</b></p>
                           <p class="pull-right p_inline text-center"><b>ESTATUS</b></p>
                         </div>
                         @for ($i=0; $i < 8; $i++)
                           @if (count($payments)>0)
                             @foreach ($payments as $payment)
                               <hr>
                               @if($payment->nivel_id==$i+1)
                                 <h4>Nivel {{$i+1}} <span style="width:20%;" class="pull-right label_custom label label-success">Pagado</span></h4>
                               @else
                                 <h4>Nivel {{$i+1}} <span class="pull-right label_custom label label-danger">No pagado</span></h4>
                               @endif
                             @endforeach
                           @else
                             <hr>
                             <h4>Nivel {{$i+1}} <span class="pull-right label label_custom label-danger">No pagado</span></h4>
                           @endif
                         @endfor
                       </div>
                       <div class="col-md-4">
                         <p class="p_inline2 text-center"><b>MONTO</b></p>
                         @for ($i=0; $i < 8; $i++)
                           @if (count($payments)>0)
                             @foreach ($payments as $payment)
                               <hr>
                               @if($payment->nivel_id==$i+1)
                                 <h4>$ {{$payment->monto}}</h4>
                               @else
                                 <h4>No registrado</h4>
                               @endif
                             @endforeach
                           @else
                             <hr>
                             <h4>No registrado</h4>
                           @endif
                         @endfor
                       </div>
                     </div>
                   </div>
                 </div>

              </div>

              <div class="col-md-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Calificaciones</h3>
                  </div>
                  <div class="panel-body">
                    @for ($i=0; $i < 8; $i++)
                      @if (count($aproved_levels)>0)
                        @foreach ($aproved_levels as $aproved_level)
                          @if($aproved_level->nivel_id==$i+1)
                            <div class="container-fluid">
                              <h4 style="margin-top:1em;" class="col-md-4">
                                Nivel {{$i+1}}
                              </h4>
                              <div style="background-color:#5cb85c; color:white;" class="text-right calificaciones-font col-md-4 well well-sm">{{$aproved_level->calif}}</div>
                            </div>
                            <hr>
                          @else
                            <div class="container-fluid">
                              <h4 style="margin-top:1em;" class="col-md-4">
                                Nivel {{$i+1}}
                              </h4>
                              <div style="background-color:#d9534f; color:white;" class="calificaciones-font col-md-4 well well-sm" role="alert">Sin calificación
                              </div>
                            </div>
                            <hr>
                          @endif
                        @endforeach
                        @else
                          <div class="container-fluid">
                            <h4 style="margin-top:1em;" class="col-md-4">
                              Nivel {{$i+1}}
                            </h4>
                            <div style="background-color:#d9534f; color:white;" class="calificaciones-font col-md-4 well well-sm" role="alert">Sin calificación
                            </div>
                          </div>
                          <hr>
                        @endif
                    @endfor
                 </div>
               </div>

             </div>

          </div>

  </div>
@endsection
