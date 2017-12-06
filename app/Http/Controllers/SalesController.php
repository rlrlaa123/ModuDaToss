<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SalesInfo;
use App\User;
use App\Category;
use App\withdrawalInfo;
use App\Savinghistory;

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
        return view('SalesInfo.SI_input')->with('category',$category);
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

        //카테고리 필터
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

     //영업 리스트
    public function show($id)
    {
        //
        //$SalesInfo = DB::table('sales_infos')->where('SalesPerson_id', $id);
        //return $SalesInfo;
        $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->orderBy('created_at','desc')->get();
        return view('SalesInfo.SI_show')->with('SalesInfo',$SalesInfo);
    }
    //영업 리스트 항목별로
    public function showstate($id,$state){

        if($state == '전체'){
            $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->orderBy('created_at','desc')->get();
            return view('SalesInfo.SI_show')->with('SalesInfo',$SalesInfo);

        }else{
            $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->where('state',$state)->orderBy('created_at','desc')->get();
            return view('SalesInfo.SI_show')->with('SalesInfo',$SalesInfo);
        }
    }
    //영업정보별 자세히 보기
    public function showdetail($SI_id){
      $SalesInfo = SalesInfo::where('id',$SI_id)->get();
      return view('SalesInfo.SI_detail')->with('SalesInfo',$SalesInfo);
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
        $SH = Savinghistory::where('SalesPerson_id',$id)->take(4)->orderBy('created_at','desc')->get();
        return view('/SalesMan/profit')->with('user',$user)->with('SH',$SH);
    }

    public function Recommender($id)
    {
        //
        $user = User::find($id);

        return view('/SalesMan/Recommender')->with('user',$user);
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

      $withdrawal = new withdrawalInfo;

      $withdrawal->memberID = $user->id;
      $withdrawal->memberName = $user->name;
      $withdrawal->bankName = $user->bankName;
      $withdrawal->accountNumber = $user->accountNumber;
      $withdrawal->requestmoney=$request->input('requestmoney');
      $withdrawal->save();

      //제출한 출금액 만큼 빼기

      //아직 구조를 모르겠다.


      return redirect('/profit'.'/'.$id);
    }
}
