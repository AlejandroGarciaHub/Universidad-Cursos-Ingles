<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;

use App\Http\Requests\CareerRequest;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $careers=Career::search($request->nombre)->orderBy('id','DESC')->paginate(5);

        return view('admin.careers.index')->with('careers',$careers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerRequest $request)
    {
        //
        $career= new Career($request->all());
        $career->save();

        flash('Se ha creado la carrera')->success();

        return redirect()->route('careers.index');
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
        $career=Career::find($id);

        return view('admin.careers.edit')->with('career',$career);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $career=Career::find($id);

        $career->fill($request->all());

        $career->save();

        flash('La carrera ha sido editada correctamente')->success();

        return redirect()->route('careers.index');
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
        $career=Career::find($id);
        $career->delete();

        flash('La carrera ha sido correctamente eliminada')->error();

        return redirect()->route('careers.index');
    }
}
