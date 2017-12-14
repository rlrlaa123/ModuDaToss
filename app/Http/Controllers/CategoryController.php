<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = \App\Category::where('id',$id)->first();
        $categories = \App\Category::all();
        return view('category.show',compact('category','categories'));
    }
}
