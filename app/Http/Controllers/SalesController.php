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

    public function store(Request $request)
    {
        $NumberofCategory = count($request->category);

        $this->validate($request, [
          'CustomerName' => 'required',
          'BusinessName' => 'required',
          'CustomerAddress' => 'required',
          'post_number' => 'required',
          'PhoneNumber' => 'required',
          'ContactTime' => 'required',
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
          $SalesInfo->Category = $request->category[$i];
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

    public function show($id)
    {
        //$SalesInfo = DB::table('sales_infos')->where('SalesPerson_id', $id);
        //return $SalesInfo;

        $Accumulate = Savinghistory::where('SalesPerson_id',$id)->sum('MoneySum');
        $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->orderBy('created_at','desc')->get();
        return view('SalesInfo.SI_show')->with('SalesInfo',$SalesInfo)->with('Accumulate',$Accumulate);

    }
    public function showall(){


      $SalesInfo = SalesInfo::get();
      return view('SalesInfo.SI_show_all')->with('SalesInfo',$SalesInfo);
    }
    //영업 리스트 항목별로
    public function showstate($id,$state){

        $Accumulate = Savinghistory::where('SalesPerson_id',$id)->sum('MoneySum');

        $SalesInfo = SalesInfo::where('SalesPerson_id',$id)->where('state',$state)->orderBy('created_at','desc')->get();
        return view('SalesInfo.SI_show')->with('SalesInfo',$SalesInfo)->with('Accumulate',$Accumulate);
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

}
