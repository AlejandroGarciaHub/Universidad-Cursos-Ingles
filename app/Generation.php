<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    //
    protected $fillable = [
        'year'
    ];

    public function students()
{
    return $this->hasMany('App\Student','generacion_id','id');
}

  public function scopeSearchGeneration($query,$year)
  {
    # code...
    return $query->where('year','=',$year);
  }

}
