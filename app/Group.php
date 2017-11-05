<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $fillable = [
        'nivel_id',
        'profesor_id',
        'aula',
        'tipo_curso'
    ];

    public function profesor()
   {
     return $this->belongsTo('App\Teacher','profesor_id','id');
   }
   public function nivel()
  {
    return $this->belongsTo('App\Level','nivel_id','id');
  }

  public function estudiantes()
  {
  return $this->hasMany('App\Group_Student','grupo_id','id');
  }
}
