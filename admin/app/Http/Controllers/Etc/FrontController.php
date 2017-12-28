<?php

namespace App\Http\Controllers\Etc;

use App\Etc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function edit()
    {
        $front_img = Etc::find(1);
        return view('Etc.Front.edit',compact('front_img'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'front_img1' => 'required',
            'front_img2' => 'required',
            'front_img3' => 'required',
        ]);

        $front_img = Etc::find(1);

        $front_img -> front_img1 = $request -> front_img1;
        $front_img -> front_img2 = $request -> front_img3;
        $front_img -> front_img2 = $request -> front_img3;
        $front_img -> save();

        return redirect('/etc');
    }
}
