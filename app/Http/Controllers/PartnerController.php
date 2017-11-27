<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesInfo;
use App\User;
use App\category;


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
        $SalesInfo = SalesInfo::where('Category',$id)->orderBy('created_at','desc')->get();
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

        //
        $SI = DB::table('sales_infos')->where('id',$id)->first();
        $category = DB::table('categories')->where('category',$SI->Category)->first();

        if( $SI->state == '접수 완료'){
          DB::table('sales_infos')->where('id',$id)->update(['state' => '진행중']);
        }else if($SI->state == '진행중'){

          if(isset($request->reason))
          {
            DB::table('sales_infos')->where('id',$id)->update(['state' => '실패']);
            DB::table('sales_infos')->where('id',$id)->update(['Fail_reason' => $request->reason]);
          }else{

            //금액 벤더사에게 지금
            $benefit = DB::table('users')->where('id',$request->SalesPerson_id)->first();
            $sum = $benefit->Benefit + $request->pay;
            DB::table('users')
            ->where('id', $request->SalesPerson_id)
            ->update(['Benefit' => $sum]);

            //적립내역에 입력
            DB::table('savinghistories')->insert(
              ['SalesPerson_id' => $request->SalesPerson_id, 'SalesPerson_name' => $benefit->name ,'MoneyType' => '거래성사금액' ,'MoneySum' => $request->pay,'created_at' => now()]
            );


            // 수수료 지급
            $user = DB::table('users')->where('id',$SI->SalesPerson_id)->first();
            $commision = ($user->Commision)+($request->pay)*(($category->commision)/100);
            DB::table('users')->where('id',$SI->SalesPerson_id)->update(['Commision' => $commision]);

            //적립내역에 입력
            DB::table('savinghistories')->insert(
              ['SalesPerson_id' => $user->id, 'SalesPerson_name' => $user->name ,'MoneyType' => '거래성사수수료' ,'MoneySum' => (($request->pay)*(($category->commision)/100)),'created_at' => now()]
            );

            //추천인 수수료 지금
            $recommendercode = $user->Recommender;
            $Recommender = DB::table('users')->where('Recommendercode',$recommendercode)->first();
            $RecommenderCommision = ($Recommender->Commision)+($request->pay)*(3/100);
            DB::table('users')->where('Recommendercode',$recommendercode)->update(['RecommenderCommision' => $RecommenderCommision]);

            //적립내역에 입력
            DB::table('savinghistories')->insert(
              ['SalesPerson_id' => $Recommender->id, 'SalesPerson_name' => $Recommender->name,'MoneyType' => '추천인 수수료' ,'MoneySum' => (($request->pay)*(3/100)),'created_at' => now()]
            );

            //영업정보 상태 변화
            DB::table('sales_infos')->where('id',$id)->update(['state' => '완료']);
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
