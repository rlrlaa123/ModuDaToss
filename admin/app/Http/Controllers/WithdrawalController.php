<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\withdrawalInfo;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $now = new Carbon();
        $dataFormat = 'd';

        if( intval($now->format($dataFormat)) > 11){

          $dataFormat = 'Y-m';
          $NextMonth = new Carbon('+1 month');
          $WDI = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $now->format($dataFormat).'-11' , $NextMonth->format($dataFormat).'-11' ])->get();
          $current = $now->format($dataFormat).'-11 ~ '.$NextMonth->format($dataFormat).'-11';
          return view('withdrawal.withdrawalInfo',[
            'WDI' => $WDI,
            'place' => 0,
            'Current' => $current,
          ]);

        }else{

          $dataFormat = 'Y-m';
          $beforMonth = new Carbon('-1 month');
          $WDI = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $beforMonth->format($dataFormat).'-11' , $now->format($dataFormat).'-11' ])->get();
          $current = $beforMonth->format($dataFormat).'-11 ~ '.$now->format($dataFormat).'-11';
          return view('withdrawal.withdrawalInfo',[
            'WDI' => $WDI,
            'place' => 0,
            'Current' => $current,
          ]);

        }

    }


    public function ExcelDownload($place,$Extension){

      $now = new Carbon();
      $dataFormat = 'd';
      $data;
      $current;

      if( intval($now->format($dataFormat)) > 11){

        $Next = $place+1;
        $nowstring = $place.' month';
        $NextMonthstring = $Next.' month';

        $now = new Carbon($nowstring);
        $NextMonth = new Carbon($NextMonthstring);
        $dataFormat = 'Y-m';
        $current = $now->format($dataFormat).'-11 ~ '.$NextMonth->format($dataFormat).'-11';
        $data = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $now->format($dataFormat).'-11' , $NextMonth->format($dataFormat).'-11' ])->get()->toArray();

      }else{

        $before = $place-1;
        $nowstring = $place.' month';
        $beforeMonthstring = $before.' month';

        $now = new Carbon($nowstring);
        $beforMonth = new Carbon($beforeMonthstring);
        $dataFormat = 'Y-m';
        $current = $beforMonth->format($dataFormat).'-11 ~ '.$now->format($dataFormat).'-11';
        $data = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $beforMonth->format($dataFormat).'-11' , $now->format($dataFormat).'-11' ])->get()->toArray();
      }

      if($Extension == 'xlsx'){

        return Excel::create($current.'출금신청기록', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data)
            {
          $sheet->fromArray($data);
            });
        })->export('xlsx');

      }else{

        return Excel::create($current.'출금신청기록', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data)
            {
          $sheet->fromArray($data);
            });
        })->export('xls');
      }
    }

    public function show($place)
    {
        $now = new Carbon();
        $dataFormat = 'd';

        if( intval($now->format($dataFormat)) > 11){

          $Next = $place+1;
          $nowstring = $place.' month';
          $NextMonthstring = $Next.' month';

          $now = new Carbon($nowstring);
          $NextMonth = new Carbon($NextMonthstring);
          $dataFormat = 'Y-m';

          $WDI = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $now->format($dataFormat).'-11' , $NextMonth->format($dataFormat).'-11' ])->get();
          $current = $now->format($dataFormat).'-11 ~ '.$NextMonth->format($dataFormat).'-11';
          return view('withdrawal.withdrawalInfo',[
            'WDI' => $WDI,
            'place' => $place,
            'Current' => $current,
          ]);

        }else{

          $before = $place-1;
          $nowstring = $place.' month';
          $beforeMonthstring = $before.' month';

          $now = new Carbon($nowstring);
          $beforMonth = new Carbon($beforeMonthstring);
          $dataFormat = 'Y-m';

          $WDI = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $beforMonth->format($dataFormat).'-11' , $now->format($dataFormat).'-11' ])->get();
          $current = $beforMonth->format($dataFormat).'-11 ~ '.$now->format($dataFormat).'-11';
          return view('withdrawal.withdrawalInfo',[
            'WDI' => $WDI,
            'place' => $place,
            'Current' => $current,
          ]);

        }
    }

}
