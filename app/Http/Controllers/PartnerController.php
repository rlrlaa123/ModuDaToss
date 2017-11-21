<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesInfo;
use App\User;
use DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $SalesInfo = SalesInfo::where('Category',$id)->get();
        return view('/Partner/SI_show')->with('SalesInfo',$SalesInfo);
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

        $SI = DB::table('sales_infos')->where('id',$id)->first();

        if( $SI->state == 1){
          DB::table('sales_infos')->where('id',$id)->update(['state' => 2]);
        }else if($SI->state == 2){

          if(isset($request->reason))
          {
            DB::table('sales_infos')->where('id',$id)->update(['state' => 4]);
          }else{
            //금액 벤더사에게 지금
            $benefit = DB::table('users')->where('id',$request->SalesPerson_id)->first();

            $sum = $SI->pay + $benefit->Benefit;

            DB::table('users')
            ->where('id', $request->SalesPerson_id)
            ->update(['Benefit' => $sum]);

            // 수수료 지급



            DB::table('sales_infos')->where('id',$id)->update(['state' => 3]);
          }
        }

        //
        //$SalesInfo = SalesInfo::find($id);
        //$Salesinfo->state = input($id);
        //$Salesinfo->save();

        return redirect('/home');

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

    public function show2(Request $request)
    {
        $id = $request->category;
        //
        $SalesInfo = SalesInfo::where('Category',$id)->get();
        return $SalesInfo;
    }

    public function show3($id,$id2)
    {
        //$id = $request->category;
        //
        //$SalesInfo = SalesInfo::where('Category',$id)->get();
        $SalesInfo = DB::table('sales_infos')->where('id',$id2)->get();
        //return $SalesInfo;
        return view('Partner/SI_detail')->with('SalesInfo',$SalesInfo);
    }
}
