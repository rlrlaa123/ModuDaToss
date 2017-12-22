<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SalesInfo;
use App\category;
use App\Real_User;

class SIController extends Controller
{
    //
    public function index()
    {
        //
        //$SalesInfo = DB::select('select * from sales_infos');
        $SalesInfo = SalesInfo::orderBy('created_at','desc')->get();

        return view('SI.SI', ['SalesInfo' => $SalesInfo]);

    }

    public function show($id){
        //$SalesInfo = DB::select('select * from sales_infos where id = ?',[$id]);
        $SalesInfo = SalesInfo::where('id',$id)->orderBy('created_at','desc')->get();

        return view('SI.SI_detail', ['SalesInfo' => $SalesInfo]);
    }

    public function Categorize($state){

        //$SalesInfo = DB::select('select * from sales_infos where state = ?',[$state]);
        $SalesInfo = SalesInfo::where('state',$state)->orderBy('created_at','desc')->get();

        return view('SI.SI', ['SalesInfo' => $SalesInfo]);
    }

    public function Grant(Request $request){
      //영업정보
      $SalesInfo = SalesInfo::where('id',$request->SI_id)->first();
      //수수료
      $fetch = category::where('category',$request->category)->first();
      $Commision = $fetch->commision;
      //영업사원정보
      $user = Real_User::where('id',$SalesInfo->SalesPerson_id)->first();

      //추천인 정보
      $Recommender = Real_User::where('recommend_code',$user->recommender)->first();

      //영업사원 수수료 지급
      $UserCommision = ($user->Commision) + ($request->GrantedMoney)*(($Commision)/100);
      Real_User::where('id',$SalesInfo->SalesPerson_id)->update([
        'Commision' => $UserCommision,
      ]);

      DB::table('savinghistories')->insert([
        'SalesPerson_id' => $SalesInfo->SalesPerson_id,
        'SalesPerson_name' => $SalesInfo->SP_name,
        'MoneyType' => '영업사원수수료',
        'MoneySum' => ($request->GrantedMoney)*(($Commision)/100),
        'created_at' => now()
      ]);

      if($Recommender == null){

      }else{

        //추천인 수수료 지급
        $RecommenderCommision = ($Recommender->RecommenderCommision) + ($request->GrantedMoney)*(5/100);
        Real_User::where('id',$Recommender->id)->update([
          'RecommenderCommision' => $RecommenderCommision,
        ]);

        DB::table('savinghistories')->insert([
          'SalesPerson_id' => $Recommender->id,
          'SalesPerson_name' => $Recommender->name,
          'MoneyType' => '추천인수수료',
          'MoneySum' => ($request->GrantedMoney)*(5/100),
          'created_at' => now(),
          'triggerid' => $user->id,
          'triggerName' => $user->name,
        ]);

      }

      //A클래스 추천인 수수료 지급
      if(isset($user->AclassRecommender)){
        $Aclass = Real_User::where('recommend_code',$user->AclassRecommender)->first();
        $AclassRecommendCommision = ($Aclass->RecommenderCommision) + ($request->GrandtedMoney)*(3/100);
        Real_user::where('id',$Aclass->id)->update([
            'RecommenderCommision' => $AclassRecommendCommision,
        ]);

        DB::table('savinghistories')->insert([
          'SalesPerson_id' => $Aclass->id,
          'SalesPerson_name' => $Aclass->name,
          'MoneyType' => 'A클래스회원수수료',
          'MoneySum' => ($request->GrantedMoney)*(3/100),
          'created_at' => now(),
          'triggerid' => $user->id,
          'triggerName' => $user->name,
        ]);
      }
      SalesInfo::where('id',$request->SI_id)->update([
        'pay' => $request->GrantedMoney,
        'state' => '완료',
      ]);

      return redirect('/');
    }

    public function Reject(Request $request){

    }

}
