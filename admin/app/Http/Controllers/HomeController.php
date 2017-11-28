<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $now = new Carbon('-20 months');
        
        //$dataFormat = 'm-d';
        //return view('home',['Now' => $now->format($dataFormat)]);
        return view('home',['Now' => $now]);
    }
}
