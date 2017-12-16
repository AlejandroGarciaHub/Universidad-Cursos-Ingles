<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_Student extends Model
{
    //
    public $table = "group_students";

    protected $fillable = [
        'grupo_id',
        'alumno_id'
    ];

    public function grupo(){
     return $this->belongsTo('App\Group','grupo_id','id');
   }

   public function alumno(){
    return $this->belongsTo('App\Student','alumno_id','id');
  }

  public function niveles_aprobados()
  {
  return $this->hasMany('App\Aproved_Level','alumno_grupo_id','id');
  }

  public function niveles_pagados()
  {
  return $this->hasMany('App\Payment','alumno_grupo_id','id');
  }


}
