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

    public function showbystate($category,$state){

      if($state == '전체'){
          $SalesInfo = SalesInfo::where('Category',$category)->orderBy('created_at','desc')->get();
          return view('Partner.SI_show')->with('SalesInfo',$SalesInfo);

      }else{
          $SalesInfo = SalesInfo::where('Category',$category)->where('state',$state)->orderBy('created_at','desc')->get();
          return view('Partner.SI_show')->with('SalesInfo',$SalesInfo);
      }
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
        $category = DB::table('categories')->where('category',$SI->Category)->first();

        if( $SI->state == '접수 완료'){
            DB::table('sales_infos')->where('id',$id)->update(['state' => '진행중']);
        }else if($SI->state == '진행중'){

            if(isset($request->reason))
            {
                DB::table('sales_infos')->where('id',$id)->update(['state' => '실패']);
                DB::table('sales_infos')->where('id',$id)->update(['Fail_reason' => $request->reason]);
                DB::table('sales_infos')->where('id',$id)->update(['pay' => 0]);

            }else{
                DB::table('sales_infos')->where('id',$id)->update(['pay'=>$request->pay]);
                //최종 체결 금액 SalesInfo에서 update
//              $SalesInfo = \App\SalesInfo::find(1);
//              $SalesInfo->pay = $request->pay;
//              $SalesInfo->save();

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
    //
    //            //적립내역에 입력
                DB::table('savinghistories')->insert([
                    'SalesPerson_id' => $user->id,
                    'SalesPerson_name' => $user->name,
                    'MoneyType' => '거래성사수수료',
                    'MoneySum' => (($request->pay)*(($category->commision)/100)),
                    'created_at' => now()
                ]);

                // A 클래스 추천인 수수료 지급
//                return $SI->SalesPerson_id;
                if(isset($user->AclassRecommender)){

                  $AclassRecommender = DB::table('users')->where('recommend_code',$user->AclassRecommender)->first();
                  $ARcommision = ($AclassRecommender->RecommenderCommision) + ($request->pay)*(3/100);
                  DB::table('users')->where('recommend_code',$user->AclassRecommender)->update(['RecommenderCommision' => $ARcommision]);

                  DB::table('savinghistories')->insert([
                      'SalesPerson_id' => $AclassRecommender->id,
                      'SalesPerson_name' => $AclassRecommender->name,
                      'MoneyType' => 'A클래스회원수수료',
                      'MoneySum' => (($request->pay)*(3/100)),
                      'created_at' => now()
                  ]);
                }

              //추천인 수수료 지금
                $recommendercode = $user->recommender;
                $Recommender = DB::table('users')->where('recommend_code',$recommendercode)->first();
                $RecommenderCommision = ($Recommender->RecommenderCommision)+($request->pay)*(5/100);
                DB::table('users')->where('recommend_code',$recommendercode)->update(['RecommenderCommision' => $RecommenderCommision]);

                //적립내역에 입력
                DB::table('savinghistories')->insert(
                  ['SalesPerson_id' => $Recommender->id, 'SalesPerson_name' => $Recommender->name,'MoneyType' => '추천인 수수료' ,'MoneySum' => (($request->pay)*(5/100)),'created_at' => now()]
                );

                //영업정보 상태 변화
                DB::table('sales_infos')->where('id',$id)->update(['state' => '완료']);
            }
        }

        //
        //$SalesInfo = SalesInfo::find($id);
        //$Salesinfo->state = input($id);
        //$Salesinfo->save();

        return redirect('/');

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
