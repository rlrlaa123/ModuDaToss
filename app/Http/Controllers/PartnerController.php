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

    public function show($id)
    {
        //
        $SalesInfo = SalesInfo::where('Category',$id)->orderBy('created_at','desc')->get();
        return view('/Partner/SI_show')->with('SalesInfo',$SalesInfo);
    }

    public function showbystate($category,$state){

        $SalesInfo = SalesInfo::where('Category',$category)->where('state',$state)->orderBy('created_at','desc')->get();
        return view('Partner.SI_show')->with('SalesInfo',$SalesInfo);

    }

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
                DB::table('sales_infos')->where('id',$id)->update(['state' => '승인대기']);
            }
        }
        return redirect('/');

    }

    public function showdetail($id,$id2)
    {
        //$id = $request->category;
        //
        //$SalesInfo = SalesInfo::where('Category',$id)->get();
        $SalesInfo = DB::table('sales_infos')->where('id',$id2)->get();
        //return $SalesInfo;
        return view('Partner/SI_detail')->with('SalesInfo',$SalesInfo);
    }

}
