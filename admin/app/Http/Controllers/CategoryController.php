<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = category::all();

        return view('Category.Category', ['Category' => $Category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Category.Category_Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'category' => 'required',
            'commision' => 'required',
//            'image' => 'image|nullable|max:1999',
        ]);

//        // Handle File Upload
//        if($request->hasFile('image'))
//        {
//            // Get filename with extension
//            $filenameWithExt = $request->file('image')->getClientOriginalName();
//            // Get just filename
//            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//            // Get just extension
//            $extension = $request->file('image')->getClientOriginalExtension();
//            // File name to store
//            $fileNameToStore = $filename.'_'.time().'.'.$extension;
//            // Upload Image
//            $path = $request->file('image')->storeAs('public/category_image',$fileNameToStore);
//        }
//        else
//        {
//            $fileNameToStore = 'noimage.jpg';
//        }

        $category = new category;
        $category->category = $request->input('category');
        $category->commision = $request->input('commision');
        $category->content = $request->input('content');
//        $category->image = $fileNameToStore;

        $category->save();

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $Category = category::find($id);

        return view('Category.Category_detail', ['Category' => $Category]);


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
        $this->validate($request, [
            'category' => 'required',
            'commision' => 'required',
        ]);

        $Category = category::find($id);

        $Category -> category = $request -> category;
        $Category -> commision = $request -> commision;
        $Category -> content = $request ->content;
        $Category -> save();
        return redirect('/category');
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
        $Category = category::find($id);

        $Category -> delete();

        return redirect('/category');

    }
}
