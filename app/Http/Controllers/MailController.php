<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;

class MailController extends Controller
{
    public function tester()
    {
        Mail::send('emails.test',[],function($message) {
//            $message->from('us@example.com', 'Laravel');

            $message->to('kimdonghyun3366@gmail.com');
        });
    }
}
