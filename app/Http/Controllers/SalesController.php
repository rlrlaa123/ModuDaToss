<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesInfo;
use App\User;
use App\Category;
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
        $category = Category::all();
        //
        return view('/SalesInfo')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $aa.$bb;


        $data = array();
        $number = 0;

        for($i=1 ; $i<=$request->Numberofitem;$i++){
          $b = $i;
          $a = 'Category'.$b;

          if(isset($request->$a)){
            $data[] = $request->$a;
            $number ++ ;
          }
        }
        if($number == 0){
            return redirect('/home');
        }


        $this->validate($request, [
          'CustomerName' => 'required',
          'BusinessName' => 'required',
          'CustomerAddress' => 'required',
          'post_number' => 'required',
          'CustomerAddress_detail' => 'required',
          'PhoneNumber' => 'required',
          'ContactTime' => 'required',
          'Characteristic' => 'required',
          'note' => 'required',
          'CustomerEmail' => 'required',
          'pay' => 'required',
          'SalesPerson_id' => 'required',
          'SP_name' => 'required',
        ]);
        for($i = 0; $i < $number ; $i++){
          $SalesInfo = new SalesInfo;
          $SalesInfo->CustomerName = $request->input('CustomerName');
          $SalesInfo->BusinessName = $request->input('BusinessName');
          $SalesInfo->CustomerAddress = $request->input('CustomerAddress');
          $SalesInfo->post_number = $request->input('post_number');
          $SalesInfo->CustomerAddress_detail=$request->input('CustomerAddress_detail');
          $SalesInfo->CustomerAddress_extra=$request->input('CustomerAddress_extra');

          $SalesInfo->PhoneNumber = $request->input('PhoneNumber');
          $SalesInfo->ContactTime = $request->input('ContactTime');
          $SalesInfo->Characteristic = $request->input('Characteristic');
          $SalesInfo->Category = $data[$i];

          $SalesInfo->note = $request->input('note');
          $SalesInfo->CustomerEmail = $request->input('CustomerEmail');
          $SalesInfo->pay = $request->input('pay');
          $SalesInfo->SalesPerson_id = $request->input('SalesPerson_id');
          $SalesInfo->SP_name = $request->input('SP_name');
          $SalesInfo->save();
        }

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

    public function mypage($id)
    {
        //

        $user = User::find($id);

        return view('/SalesMan/mypage')->with('user',$user);
    }

    public function profit($id)
    {
        //
        $user = User::find($id);

        return view('/SalesMan/profit')->with('user',$user);
    }

    public function Recommender($id)
    {
        //
        return view('/SalesMan/Recommender');
    }

    public function withdrawal($id)
    {
        //
        $user = User::find($id);

        return view('/SalesMan/withdrawal')->with('user',$user);
    }

    public function withdrawalrequest(Request $request, $id){

      return $request.$id;
    }
}
