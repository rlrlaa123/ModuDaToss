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
        $beforMonth = new Carbon('-1 month');
        $dataFormat = 'Y-m';

        $WDI = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $beforMonth->format($dataFormat).'-11' , $now->format($dataFormat).'-11' ])->get();

        $place = 0;
        return view('withdrawal.withdrawalInfo')->with('WDI',$WDI)->with('place',$place);
    }


    public function exceltest($place){

      $before = $place-1;
      $nowstring = $place.' month';
      $beforeMonthstring = $before.' month';

      $now = new Carbon($nowstring);
      $beforMonth = new Carbon($beforeMonthstring);
      $dataFormat = 'Y-m';

      $data = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $beforMonth->format($dataFormat).'-11' , $now->format($dataFormat).'-11' ])->get()->toArray();

      return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		  })->export('xlsx');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($place)
    {
        //
        $before = $place-1;
        $nowstring = $place.' month';
        $beforeMonthstring = $before.' month';

        $now = new Carbon($nowstring);
        $beforMonth = new Carbon($beforeMonthstring);
        $dataFormat = 'Y-m';

        $WDI = withdrawalInfo::orderBy('created_at','desc')->whereBetween('created_at',[ $beforMonth->format($dataFormat).'-11' , $now->format($dataFormat).'-11' ])->get();

        return view('withdrawal.withdrawalInfo')->with('WDI',$WDI)->with('place',$place);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
