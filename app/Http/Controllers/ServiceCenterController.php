<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceCenterController extends Controller
{
    public function index($menu)
    {
        if ($menu == 'notice')
        {
            $type = 1;
            $notices = \App\ServiceCenter::where('menu',$menu)->get();

            return view('ServiceCenter.notice.index',compact('notices'));
        }

        elseif ($menu == 'frequently')
        {
            $frequently = \App\ServiceCenter::where('menu',$menu)->get();

            return view('ServiceCenter.frequently.index',compact('frequently'));
        }

        elseif ($menu == '')
        return 0;
    }
    public function show($menu,$id)
    {
        if ($menu == 'notice') {
            $notices = \App\ServiceCenter::where('id', $id)->first();

            return view('ServiceCenter.notice.show', compact('notices'));
        }
    }
}
