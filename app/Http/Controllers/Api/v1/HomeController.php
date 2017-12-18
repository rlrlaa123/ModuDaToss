<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index()
    {
        $categories = \App\Category::all();
        flash('환영합니다.');$salesinfos = \App\SalesInfo::orderBy('created_at','desc')->take(4)->get();

        return Response(json_encode($salesinfos),200);
    }
}