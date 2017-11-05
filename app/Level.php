<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    protected $fillable = [
        'descripcion_nivel'
    ];

    public function aproved_levels()
{
    return $this->belongsToMany('App\Aproved_Level');
}

public function payments()
{
return $this->hasMany('App\Payments','nivel_id','id');
}


}
