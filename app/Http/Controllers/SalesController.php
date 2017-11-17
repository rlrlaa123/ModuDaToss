<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesInfo;
use App\User;
use DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/SalesInfo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return view('home');

        $this->validate($request, [
          'CustomerName' => 'required',
          'BusinessName' => 'required',
          'CustomerAddress' => 'required',
          'PhoneNumber' => 'required',
          'ContactTime' => 'required',
          'Characteristic' => 'required',
          'Category' => 'required',
          'note' => 'required',
          'CustomerEmail' => 'required',
          'pay' => 'required',
        ]);

        $SalesInfo = new SalesInfo;
        $SalesInfo->CustomerName = $request->input('CustomerName');
        $SalesInfo->BusinessName = $request->input('BusinessName');
        $SalesInfo->CustomerAddress = $request->input('CustomerAddress');
        $SalesInfo->PhoneNumber = $request->input('PhoneNumber');
        $SalesInfo->ContactTime = $request->input('ContactTime');
        $SalesInfo->Characteristic = $request->input('Characteristic');
        $SalesInfo->Category = $request->input('Category');
        $SalesInfo->note = $request->input('note');
        $SalesInfo->CustomerEmail = $request->input('CustomerEmail');
        $SalesInfo->pay = $request->input('pay');
        $SalesInfo->SalesPerson_id = $request->input('SalesPerson_id');
        $SalesInfo->save();

        return redirect('/home');
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
        //$SalesInfo = DB::table('sales_infos')->where('SalesPerson_id', $id);
        //return $SalesInfo;
        $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->get();
        return view('/SI_show')->with('SalesInfo',$SalesInfo);
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
    }

    public function mypage()
    {
        //
        return view('/SalesMan/mypage');
    }

    public function profit()
    {
        //
        return view('/SalesMan/profit');
    }

    public function Recommender()
    {
        //
        return view('/SalesMan/Recommender');
    }
}
