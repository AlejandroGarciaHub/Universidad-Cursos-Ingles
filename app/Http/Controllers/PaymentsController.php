<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Student;
use App\Level;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\PaymentRequest;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments=Payment::orderBy('id','DESC')->paginate(5);

        return view('admin.payments.index')->with('payments',$payments);

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
        $students = Student::select('id', DB::raw("concat(nombres, ' ', apellidos) as nombre_completo"))->pluck('nombre_completo', 'id');


        return view('admin.payments.create')->with('levels',$levels)->with('students',$students);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        //
        $payment= new Payment($request->all());
        $payment->save();

        flash('Se ha registrado el pago')->success();

        return redirect()->route('payments.index');

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
        $levels=Level::orderBy('descripcion_nivel','ASC')->pluck('descripcion_nivel','id');
        $students = Student::select('id', DB::raw("concat(nombres, ' ', apellidos) as nombre_completo"))->pluck('nombre_completo', 'id');

        $payment=Payment::find($id);

        return view('admin.payments.edit')->with('levels',$levels)->with('students',$students)->with('payment',$payment);

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
        $payment=Payment::find($id);

        $payment->fill($request->all());

        $payment->save();

        flash('El pago ha sido editado satisfactoriamente')->success();

        return redirect()->route('payments.index');

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
        $payment=Payment::find($id);
        $payment->delete();

        flash('El registro de pago ha sido correctamente eliminado')->error();

        return redirect()->route('payments.index');

    }
}
