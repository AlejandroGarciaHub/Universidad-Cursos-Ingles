<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Generation;

/**
 *
 */
class GenerationComposer
{

  public function compose(View $view)
  {
    # code...
    $generations=Generation::orderBy('year','ASC')->get();
    $count = count($generations);
    $view->with('generations',$generations)->with('countGenerations',$count);
  }
}
