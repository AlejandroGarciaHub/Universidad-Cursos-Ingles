<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'nombres',
        'apellidos',
        'numero_control',
        'carrera_id',
        'generacion_id',
        'promedio',
        'constancia_expedida'
    ];

    public function career()
 {
   return $this->belongsTo('App\Career','carrera_id','id');
 }

 public function generation()
{
return $this->belongsTo('App\Generation','generacion_id','id');
}

public function payments()
{
return $this->hasMany('App\Payment','alumno_id','id');
}

public function inscripciones()
{
return $this->hasMany('App\Group_Student','alumno_id','id');
}


public function scopeSearch($query,$nombres){
  return $query->where('nombres','LIKE',"%$nombres%")->orWhere('apellidos','LIKE',"%$nombres%")->orWhere('numero_control','LIKE',"%$nombres%");
}

}
