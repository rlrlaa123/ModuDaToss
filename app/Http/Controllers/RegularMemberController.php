<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegularMemberController extends Controller
{
    public function create($userid)
    {
        return view('RegularMember.create',compact('userid'));
    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'gender' => 'required',
//            'phoneNumber' => 'required|min:11|int',
//            'bankName' => 'required',
//            'accountNumber' => 'required',
//            'recommend_code' => 'required',
//        ]);

        $rules = [
            'gender' => 'required',
            'phoneNumber' => 'required|min:11|int',
            'bankName' => 'required',
            'accountNumber' => 'required',
            'recommend_code' => 'required',
        ];

        $messages = [
            'phoneNumber.integer' => "휴대폰 번호는 '-' 없이 숫자만 입력하세요.",
        ];
        $this->validate($request, $rules, $messages);

        $user = \App\User::where('id',$request->id)->first();
        $user->gender = $request->gender;
        $user->phoneNumber = $request->phoneNumber;
        $user->bankName = $request->bankName;
        $user->accountNumber = $request->accountNumber;
        $user->recommend_code = $request->recommend_code;

        // 정회원 승인 대기 유저
        $user->type = 5;

        $user->save();
        flash('정회원 신청이 완료되었습니다. 승인 요청이 완료될 것입니다.');
        return redirect('/');
    }
}