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
    //
    public function mypage($id)
    {
        $user = User::find($id);

        return view('/SalesMan/mypage')->with('user',$user);
    }

    public function mypageedit($id)
    {
        $user = User::find($id);

        return view('/SalesMan/mypage/edit')->with('user',$user);
    }

    public function mypageupdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->bankName = $request->bankName;
        $user->accountNumber = $request->accountNumber;
        $user->photo = $request->photo;

        $user->save();

        return view('/SalesMan/mypage')->with('user',$user);
    }

    public function profit($id)
    {
        //
        $user = User::find($id);
        $Accumulate = Savinghistory::where('SalesPerson_id',$user->id)->sum('MoneySum');
        return view('/SalesMan/profit')->with('user',$user)
                                        ->with('Accumulate',$Accumulate);

    }
    public function profitdetail($id){
        $user = User::find($id);
        $SH = Savinghistory::where('SalesPerson_id',$id)->orderBy('created_at','desc')->get();
        return view('/SalesMan/profitdetail')->with('user',$user)->with('SH',$SH);

    }

    public function Recommender($id)
    {
        //
        $user = User::find($id);
        $recommendcode = $user->recommend_code;
        $recommendee = User::where('recommender',$recommendcode)->get();

        $SH = Savinghistory::where('SalesPerson_id',$id)->where('MoneyType','추천인수수료')->orWhere('MoneyType','A클래스회원수수료')->orderBy('created_at','desc')->get();

        return view('/SalesMan/Recommender')->with('user',$user)
                                            ->with('SH',$SH)
                                            ->with('recommendee',$recommendee);
    }
    public function Recommenderdetail($id,$recommendeeid){
        $user = User::find($id);
        $SH = Savinghistory::where('SalesPerson_id',$id)->where('triggerid',$recommendeeid)->orderBy('created_at','desc')->get();
        $name = $SH[0]->triggerName;

        return view('/SalesMan/Recommenderdetail')->with('user',$user)
                                                  ->with('Name',$name)
                                                  ->with('SH',$SH);
    }

    public function withdrawal($id)
    {
        //
        $user = User::find($id);

        return view('/SalesMan/withdrawal')->with('user',$user);
    }

    public function withdrawalrequest(Request $request, $id){

      //출금액은 반드시 필요
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

      //제출한 출금액 만큼 빼기

      //아직 구조를 모르겠다.


      return redirect('/profit'.'/'.$id);
    }

    public function WithdrawalLog($id){
      $user = User::find($id);
      $data = withdrawalInfo::where('memberID',$id)->orderBy('created_at','desc')->get();
      return view('SalesMan.WithdrawalLog')->with('data',$data)->with('user',$user);
    }

    public function DepositLog($id){
      $user = User::find($id);
      $data = Savinghistory::where('SalesPerson_id',$id)->orderBy('created_at','desc')->get();
      return view('SalesMan.DepositLog')->with('data',$data)->with('user',$user);
    }
}
