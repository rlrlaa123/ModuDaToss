<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SalesInfo;

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

}
