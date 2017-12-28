<?php

namespace App\Http\Controllers\Etc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EtcController extends Controller
{
    public function index()
    {
        return view('Etc.index');
    }
}
