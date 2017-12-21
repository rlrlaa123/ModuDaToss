<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SocialController extends Controller
{
    /**
     * SocialController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function execute(Request $request, $provider)
    {
        if (! $request->has('code')) {

            return $this->redirectToProvider($provider);
        }

        return $this->handleProviderCallback($provider);
    }

    protected function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }



    protected function handleProviderCallback($provider)
    {
        $user = \Socialite::driver($provider)->user();

        $user = (\App\User::whereEmail($user->getEmail())->first())
            ?: \App\User::create([
                'name'  => $user->getName() ?: 'unknown',
                'email' => $user->getEmail(),
                'activated' => 1,
                'type' => 0,
            ]);

        auth()->login($user);
        flash(
             auth()->user()->name . '님 환영합니다.'
        );

        return redirect(route('/'));
    }
}