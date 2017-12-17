<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

use App\Http\Requests\LevelRequest;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $levels=Level::orderBy('id','DESC')->get();

        return view('admin.levels.index')->with('levels',$levels);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LevelRequest $request)
    {
        //
        $level= new Level($request->all());
        $level->save();

        flash('Se ha creado el nivel')->success();

        return redirect()->route('levels.index');

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
        $level=Level::find($id);

        return view('admin.levels.edit')->with('level',$level);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LevelRequest $request, $id)
    {
        //
        $level=Level::find($id);

        $level->fill($request->all());

        $level->save();

        flash('El nivel ha sido editado correctamente')->success();

        return redirect()->route('levels.index');

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
        $level=Level::find($id);
        $level->delete();

        flash('El nivel ha sido correctamente eliminado')->error();

        return redirect()->route('levels.index');

    }
}
