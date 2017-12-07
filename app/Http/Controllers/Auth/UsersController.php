<?php

namespace App\Http\Controllers;

use function compact;
use Illuminate\Http\Request;
use function redirect;
use Session;
use Illuminate\Support\Str;
use function str_random;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        flash('다음 폼을 작성해주세요.');
        return view('users.create');
    }

    public function store(Request $request)
    {
        //추천인 코드가 맞는지 확인
        if ($request->recommender)
        {
            if(! \DB::table('users')->where('recommend_code',$request->recommender)->first()) {

                return redirect(route('users.create'))->with('flash_message','추천인 코드가 정확하지 않습니다. 뒤로 가세요')->withInput();
            }
        }

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $confirmCode = str_random(60);
        $type = 0; # 일반회원

        $AclassRecommender = null;

        if(isset($request->recommender)){
          $var = \App\User::where('recommend_code',$request->recommender)->first();
          if(isset($var)){

            if($var->type == 4){
              $AclassRecommender = $var->recommend_code;
            }
            else{
              if(isset($var->AclassRecommender)){
                $AclassRecommender = $var->AclassRecommender;
              }
              else{
                $AclassRecommender = null;
              }
            }
          }
        }

        $user = \App\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'confirm_code' => $confirmCode,
            'type' => $type,
            'recommender' => $request->input('recommender'),
            'AclassRecommender' => $AclassRecommender,
        ]);
//        \Mail::send('emails.auth.confirm', compact('user'), function ($message) use ($user) {
//            $message->to($user->email);
//            $message->subject(
//                sprintf('[%s] 회원가입을 확인해 주세요.', config('app.name'))
//            );
//        });
//        event(new \App\Events\UserCreated($user));


        auth()->login($user);

        return redirect(route('home'))->with('flash_message','가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인하시고 로그인해 주세요.');
    }
    public function confirm($code)
    {
        $user = \App\User::whereConfirmCode($code)->first();

        if (! $user) {
            flash('URL이 정확하지 않습니다.');
        }

        $user->activated = 1;
        $user->confirm_code = null;
        $user->save();

        auth()->login($user);

        return redirect(route('home'))->with('flash_message', auth()->user()->name . '님, 환영합니다 가입 확인되었습니다.');
    }
}
