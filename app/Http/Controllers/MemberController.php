<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesInfo;
use App\User;
use App\Category;
use App\withdrawalInfo;
use App\Savinghistory;
use DB;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mypage()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('/SalesMan/mypage')->with('user',$user);
    }

    public function mypageedit()
    {
        $id = auth()->user()->id;

        $user = User::find($id);

        return view('/SalesMan/mypage/edit')->with('user',$user);
    }

    public function mypageupdate(Request $request)
    {
        $id = auth()->user()->id;

        $user = User::find($id);
        $user->name = $request->name;
        $user->bankName = $request->bankName;
        $user->accountNumber = $request->accountNumber;
        $user->photo = $request->photo;

        $user->save();

        return view('/SalesMan/mypage')->with('user',$user);
    }

    public function profit()
    {
        //
        $id = auth()->user()->id;
        $user = User::find($id);
        $Accumulate = Savinghistory::where('SalesPerson_id',$user->id)->sum('MoneySum');
        return view('/SalesMan/profit', compact('user','Accumulate'));
    }

    public function Recommender()
    {
        //
        $id = auth()->user()->id;

        $user = User::find($id);

        $recommendcode = $user->recommend_code;

        $recommendee;

        if($recommendcode == NULL){
          $recommendee = 0;
        }else{
          $recommendee = count(User::where('recommender',$recommendcode)->get());
        }

        $SH = Savinghistory::where('SalesPerson_id',$id)->where('MoneyType','추천인수수료')->orWhere('SalesPerson_id',$id)->Where('MoneyType','A클래스회원수수료')->orderBy('created_at','desc')->paginate(11);

        return view('/SalesMan/Recommender',compact('user','SH','recommendee'));
    }


    public function withdrawal()
    {
        //
        $id = auth()->user()->id;

        $user = User::find($id);

        return view('/SalesMan/withdrawal',compact('user'));
    }

    public function withdrawalrequest(Request $request){

      //출금액은 반드시 필요
      $id = auth()->user()->id;

      $this->validate($request, [
        'requestmoney' => 'required',
      ]);

      //출금액 저장
      $user = User::where('id',$id)->first();

      $Requestedmoney = $request->requestmoney;
      $UserCommision = $user->Commision;
      $UserReCommision = $user->RecommenderCommision;
      $Leftovers = 0;

      if( $Requestedmoney > $UserCommision){
        $Leftovers = $Requestedmoney - $UserCommision;
        $UserCommision = 0;
        $UserReCommision = $UserReCommision - $Leftovers;
      }else{
        $UserCommision = $UserCommision - $Requestedmoney;
      }
      ////해당 영업사원에게 수수료 업데이트
      User::where('id',$id)->update([
            'Commision'=>$UserCommision,
            'RecommenderCommision'=>$UserReCommision,
      ]);

      //return $user->Commision;
      $withdrawal = new withdrawalInfo;

      $withdrawal->memberID = $user->id;
      $withdrawal->memberName = $user->name;
      $withdrawal->bankName = $user->bankName;
      $withdrawal->account_number = $user->accountNumber;
      $withdrawal->requestmoney=$request->input('realrequest');
      $withdrawal->save();

      return redirect('/profit');
    }

    public function WithdrawalLog(){
      $id = auth()->user()->id;
      $user = User::find($id);
      $data = withdrawalInfo::where('memberID',$id)->orderBy('created_at','desc')->paginate(11);
      return view('SalesMan.WithdrawalLog',compact('data'));
    }

    public function DepositLog(){
      $id = auth()->user()->id;
      $user = User::find($id);
      $data = Savinghistory::where('SalesPerson_id',$id)->orderBy('created_at','desc')->paginate(11);
      return view('SalesMan.DepositLog',compact('data'));
    }

    public function Recommenders(){

      return view('SalesMan.recommenders');
    }

    public function recomfetch($id){

      $recommenders = DB::table('users')->where('recommender',$id)->get();

      return $recommenders;

    }

}
