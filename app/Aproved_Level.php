<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Aproved_Level extends Model
{
    //
    public $table = "aproved_levels";
    protected $fillable = [
        'calif',
        'calif_especial',
        'alumno_grupo_id'
    ];

    public function alumno_grupo()
   {
     return $this->belongsTo('App\Group_Student','alumno_grupo_id','id');
   }

    public function scopeSearch($query,$nombres){
      return $query->whereHas('student', function ($q) use ($nombres) {
     $q->where('nombres', 'like', '%' . $nombres . '%');
});
    }
}
