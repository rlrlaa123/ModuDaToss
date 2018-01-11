<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesInfo;
use App\User;
use App\category;


use DB;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show()
    {
        return view('/Partner/SI_show');
    }

    public function SIshow(Request $request){

      $category = auth()->user()->category;

      if($request->state == '전체'){

          $SalesInfo = SalesInfo::where('Category',$category)->orderBy('created_at','desc')->paginate(11);

      }else{

        $SalesInfo = SalesInfo::where('Category',$category)->where('state',$request->state)->orderBy('created_at','desc')->paginate(11);

      }

      return $SalesInfo;

    }

    public function update(Request $request)
    {
        $id = $request->SI;
        $SI = DB::table('sales_infos')->where('id',$id)->first();

        if( $SI->state == '접수 완료'){
            DB::table('sales_infos')->where('id',$id)->update(['state' => '진행중']);
            event('sales.proceed',[$SI->SalesPerson_id,$SI->id]);
        }else if($SI->state == '진행중'){

            if(isset($request->reason))
            {
                DB::table('sales_infos')->where('id',$id)->update(['state' => '실패']);
                DB::table('sales_infos')->where('id',$id)->update(['Fail_reason' => $request->reason]);
                DB::table('sales_infos')->where('id',$id)->update(['pay' => 0]);

            }else{
                DB::table('sales_infos')->where('id',$id)->update(['pay'=>$request->pay]);
                DB::table('sales_infos')->where('id',$id)->update(['state' => '승인대기']);
            }
        }
        return redirect('/');

    }

    public function showdetail($id)
    {

        $SalesInfo = SalesInfo::where('id',$id)->first();
        //return $SalesInfo;
        return view('Partner/SI_detail')->with('SI',$SalesInfo);
    }

}
