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
        $users = DB::table('users')->get();
        return view('member.main')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        if ($request->type==4)
        {
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                'name' => 'required',
                'gender' => 'required',
                'phoneNumber' => 'required',
                'bankName' => 'required',
                'accountNumber' => 'required',
//                'category' => 'required',
            ]);

            $activated = 1;

            DB::table('users')->insert([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'gender' => $request->gender,
                'phoneNumber' => $request->phoneNumber,
                'bankName' => $request->bankName,
                'accountNumber' => $request->accountNumber,
                'photo' => $request->photo,
                'signature' => $request->signature,
//                'category' => $request->category,
                'type' => $request->type,
                'activated' => $activated,
                'recommend_code' => $request->recommend_code,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ]);

            return redirect('/');
        }
        else {
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                'name' => 'required',
                'gender' => 'required',
                'phoneNumber' => 'required',
                'bankName' => 'required',
                'accountNumber' => 'required',
                'category' => 'required',
            ]);

            $activated = 1;

            DB::table('users')->insert([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'gender' => $request->gender,
                'phoneNumber' => $request->phoneNumber,
                'bankName' => $request->bankName,
                'accountNumber' => $request->accountNumber,
                'photo' => $request->photo,
                'signature' => $request->signature,
                'category' => $request->category,
                'type' => $request->type,
                'activated' => $activated,
                'recommend_code' => $request->recommend_code,
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ]);

            return redirect('/');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $users = DB::table('users')->where('type',$type)->get();
        return view('member.main', [
          'type' => $type,
          'users' => $users,
        ]);
    }

    
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
        }else if($request->type == 5){
            DB::table('users')->where('id',$id)->update(['type' => 1]);
        }

        return redirect('/');
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

    public function Memberdetail($userid){

        $users = DB::select('select * from users where id = ?',[$userid]);
        return view('member.MemberDetail',['users' => $users]);
    }

    public function CreateAClass(){

        $users = \App\Real_User::all();

        return view('member.A_ClassAdd', compact('users'));
    }

    public function UpdateAClass($userid){
        $user = \App\Real_User::find($userid);

        $user->type = 4;

        $user->save();

        return redirect('/member/4');
    }
}
