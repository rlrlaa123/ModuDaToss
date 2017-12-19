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
        return view('/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Choosecategory(){
        $category = Category::all();

        return view('SalesInfo.SI_input_category')->with('category',$category);

    }

    public function create(Request $request)
    {
        if($request->all() == null){
          return back();
        };

        $passeddata = $request->all();

        return view('SalesInfo.SI_input')->with('passeddata',$passeddata);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NumberofCategory = count($request->category);

        $this->validate($request, [
          'CustomerName' => 'required',
          'BusinessName' => 'required',
          'CustomerAddress' => 'required',
          'post_number' => 'required',
//          'CustomerAddress_detail' => 'required',
          'PhoneNumber' => 'required',
          'ContactTime' => 'required',
          'Characteristic' => 'required',
          'note' => 'required',
          'CustomerEmail' => 'required',
          'SalesPerson_id' => 'required',
          'SP_name' => 'required',
          'images' => 'image|nullable|max:1999'
        ]);

        //Handle File upload
        if($request->hasFile('images')){

          $filenameWithExt = $request->file('images')->getClientOriginalName();

          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

          $extension = $request->file('images')->getClientOriginalExtension();

          $fileNameToStore = $filename.'_'.time().'.'.$extension;

          $path = $request->file('images')->storeAs('public/images',$fileNameToStore);
        }else{
          $fileNameToStore = 'noimages.jpg';
        }

        for($i = 0; $i < $NumberofCategory ; $i++){
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
          $SalesInfo->Category = $request->category[$i];
          $SalesInfo->note = $request->input('note');
          $SalesInfo->CustomerEmail = $request->input('CustomerEmail');
          $SalesInfo->pay = $request->money[$i];
          $SalesInfo->SalesPerson_id = $request->input('SalesPerson_id');
          $SalesInfo->SP_name = $request->input('SP_name');
          $SalesInfo->state= '진행중';
          $SalesInfo->images = $fileNameToStore;
          $SalesInfo->save();
        }

        return redirect('/');
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
        //$SalesInfo = DB::table('sales_infos')->where('SalesPerson_id', $id);
        //return $SalesInfo;

        $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->orderBy('created_at','desc')->get();
        return view('SalesInfo.SI_show')->with('SalesInfo',$SalesInfo);

    }
    public function showall(){

      $SalesInfo = SalesInfo::get();
      return view('SalesInfo.SI_show_all')->with('SalesInfo',$SalesInfo);
    }
    //영업 리스트 항목별로
    public function showstate($id,$state){

        $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->where('state',$state)->orderBy('created_at','desc')->get();
        return view('SalesInfo.SI_show')->with('SalesInfo',$SalesInfo);
    }
    public function showstateall($state){

        $SalesInfo = SalesInfo::where('state',$state)->orderBy('created_at','desc')->get();
        return view('SalesInfo.SI_show_all')->with('SalesInfo',$SalesInfo);
    }
    //영업정보별 자세히 보기
    public function showdetail($SI_id){
      $SalesInfo = SalesInfo::where('id',$SI_id)->first();
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
        $user = User::find($id);

        return view('/SalesMan/mypage')->with('user',$user);
    }

    public function mypageedit($id)
    {
        $user = User::find($id);

        return view('/SalesMan/mypage/edit')->with('user',$user);
    }

    public function mypageupdate($id)
    {
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

        $SH = Savinghistory::where('SalesPerson_id',$id)->orderBy('created_at','desc')->get();

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

      $withdrawal = new withdrawalInfo;

      $withdrawal->memberID = $user->id;
      $withdrawal->memberName = $user->name;
      $withdrawal->bankName = $user->bankName;
      $withdrawal->account_number = $user->accountNumber;
      $withdrawal->requestmoney=$request->input('requestmoney');
      $withdrawal->save();

      //제출한 출금액 만큼 빼기

      //아직 구조를 모르겠다.


      return redirect('/profit'.'/'.$id);
    }
}
