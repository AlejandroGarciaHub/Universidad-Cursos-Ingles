<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Level;
use App\Teacher;

use App\Http\Requests\GroupRequest;


use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups=Group::orderBy('id','DESC')->paginate(8);

        return view('admin.groups.index')->with('groups',$groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $levels=Level::orderBy('descripcion_nivel','ASC')->pluck('descripcion_nivel','id');
        $teachers = Teacher::select('id', DB::raw("concat(nombres, ' ', apellidos) as nombre_completo"))->pluck('nombre_completo', 'id');


        return view('admin.groups.create')->with('levels',$levels)->with('teachers',$teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        //
        $group= new Group($request->all());
        $group->save();

        flash('Se ha registrado un nuevo grupo')->success();

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $group=Group::find($id);
        $levels=Level::orderBy('descripcion_nivel','ASC')->pluck('descripcion_nivel','id');
        $teachers = Teacher::select('id', DB::raw("concat(nombres, ' ', apellidos) as nombre_completo"))->pluck('nombre_completo', 'id');

        return view('admin.groups.edit')->with('group',$group)->with('levels',$levels)->with('teachers', $teachers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        //
        $group= Group::find($id);
        $group->fill($request->all());
        $group->save();

        flash('Se ha actualizado el grupo')->success();

        return redirect()->route('groups.index');

    }

    public function cerrarGrupo(Request $request, $id)
    {
      $group= Group::find($id);
      $group->estatus=false;
      $group->save();

      flash('Se ha actualizado el grupo')->success();

      return redirect()->route('groups.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $group=Group::find($id);
        $group->delete();

        flash('El grupo ha sido correctamente eliminado')->error();

        return redirect()->route('groups.index');
    }
}
