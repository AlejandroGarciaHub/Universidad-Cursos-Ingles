<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'nivel_id',
        'alumno_id',
        'monto'
    ];
    public function level()
   {
     return $this->belongsTo('App\Level','nivel_id','id');
   }
   public function student()
  {
    return $this->belongsTo('App\Student','alumno_id','id');
  }

}
