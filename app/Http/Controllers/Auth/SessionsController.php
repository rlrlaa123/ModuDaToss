<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->has('remember'))) {

            flash('이메일 또는 비밀번호가 맞지 않습니다.');
            return back()->withInput();
        }
//j
//        if(! auth()->user()->activated) {
//            auth()->logout();
//            return back()->with('flash_message','이메일에서 본인인증을 해주세요.')->withInput();
//        }
//        auth()->attempt($request->only('email','password'), $request->has('remember'));

        return redirect(route('/'))->with('flash_message', auth()->user()->name . '님, 환영합니다.');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect(route('/'))->with('flash_message','또 방문해주세요.');
    }
}