<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\category;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Category = category::all();
        return view('member.VendorAdd')->with('Category',$Category);
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
        $this->validate($request, [
          'email' => 'required',
          'password' => 'required',
          'name' => 'required',
          'phoneNumber' => 'required',
          'bankName' => 'required',
          'accountNumber' => 'required',
          'category' => 'required',
        ]);

        DB::table('users')->insert([
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'name' => $request->name,
          'phoneNumber' => $request->phone,
          'bankName' => $request->bank,
          'accountNumber' => $request->account,
          'photo' => $request->photo,
          'signature' => $request->signature,
          'category' => $request->category,
          'type' => $request->type
        ]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = DB::select('select * from users where type = ? ',[$id]);

        return view('member.main', ['users' => $users]);
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
        if($request->type == 0){
          DB::table('users')->where('id',$id)->update(['type' => 1]);
        }else if($request->type == 1){
          DB::table('users')->where('id',$id)->update(['type' => 3]);
        }else if($request->type == 2){
          DB::table('users')->where('id',$id)->update(['type' => 2]);
        }else if($request->type == 3){
          DB::table('users')->where('id',$id)->update(['type' => 1]);
        }

        return redirect('/home');
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

    public function show2()
    {
        //
        $Sales_info = DB::select('select * from sales_infos');

        return view('SI.SI', ['Sales_info' => $Sales_info]);

    }

    public function Memberdetail($type,$userid){

      $users = DB::select('select * from users where id = ?',[$userid]);
      return view('member.MemberDetail',['users' => $users]);

    }
}
