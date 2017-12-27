<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = \App\Category::where('id',$id)->first();
        $categories = \App\Category::all();

        return Response(json_encode(array('categories'=>$categories,'category'=>$category)),200);
    }
}
