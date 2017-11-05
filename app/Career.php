<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected $fillable = [
        'nombre'
    ];

    public function scopeSearch($query,$nombre){
      return $query->where('nombre','LIKE',"%$nombre%");
    }

    public function students()
{
    return $this->hasMany('App\Student','id','carrera_id');
}
}
