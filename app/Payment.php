<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public $table = "payments";

    protected $fillable = [
        'alumno_grupo_id',
        'monto'
    ];

    public function alumno_grupo()
   {
     return $this->belongsTo('App\Group_Student','alumno_grupo_id','id');
   }

}
