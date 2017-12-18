<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = \App\Category::all();
//        flash('환영합니다.');
//        $salesinfos = \App\SalesInfo::orderBy('created_at','desc')->take(4)->get();

        return view('home');
    }
}
