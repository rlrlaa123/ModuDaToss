<?php

namespace App\Http\Controllers;

use App\SalesInfo;
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

    public function salesCompleted($category,$sales_id)
    {
        $vendor = User::where('category',$category);
        $SalesInfo = SalesInfo::find($sales_id);

        Mail::send('emails.completed',['vendor'=>$vendor,'sales_info'=>$SalesInfo],function($message) use ($vendor,$SalesInfo){
            $message->to($vendor->email);
        });

        $front_img = Etc::find(1);
        return view('home',compact('front_img'));
    }
}
