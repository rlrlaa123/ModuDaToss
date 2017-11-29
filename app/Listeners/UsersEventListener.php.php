<?php
/**
 * Created by PhpStorm.
 * User: donghyunkim
 * Date: 2017. 11. 15.
 * Time: PM 9:57
 */

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersEventListener
{

    public function handle(Login $event)
    {
        $event->user->last_login = \Carbon\Carbon::now();

        return $event->user->save();
    }

    public function subscribe(\Illuminate\Events\Dispatcher $events)
    {
        // 코드 23-15
        // $events->listen() 구문을 여러 개 써서 이벤트와 처리 로직을 연결할 수 있습니다.
        $events->listen(
            \App\Events\UserCreated::class,
            __CLASS__ . '@onUserCreated'
        );

        $events->listen(
            \App\Events\PasswordRemindCreated::class,
            __CLASS__ . '@onPasswordRemindCreated'
        );
    }

    public function onUserCreated(\App\Events\UserCreated $event)
    {
        $user = $event->user;

        \Mail::send(
            'emails.auth.confirm',
            compact('user'),
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject(
                    sprintf('[%s] 회원 가입을 확인해주세요.', config('app.name'))
                );
            }
        );
    }

    public function onPasswordRemindCreated(\App\Events\PasswordRemindCreated $event)
    {
        \Mail::send('emails.passwords.reset',
            ['token' => $event->token],
            function ($message) use ($event) {
                $message->to($event->email);
                $message->subject(
                    sprintf('[%s] 비밀번호를 초기화하세요.', config('app.name'))
                );
            });
    }
}