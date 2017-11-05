<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GenerationRequest;
use App\Generation;

class GenerationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $generations=Generation::orderBy('id','DESC')->paginate(5);

        return view('admin.generations.index')->with('generations',$generations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.generations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerationRequest $request)
    {
        //
        $generation= new Generation($request->all());
        $generation->save();

        flash('Se ha creado la generación')->success();

        return redirect()->route('generations.index');
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
        $generation=Generation::find($id);

        return view('admin.generations.edit')->with('generation',$generation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenerationRequest $request, $id)
    {
        //

        $generation=Generation::find($id);

        $generation->fill($request->all());

        $generation->save();

        flash('La generación ha sido editada correctamente')->success();

        return redirect()->route('generations.index');
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
        $generation=Generation::find($id);
        $generation->delete();

        flash('La generación ha sido correctamente eliminada')->error();

        return redirect()->route('generations.index');
    }
}
