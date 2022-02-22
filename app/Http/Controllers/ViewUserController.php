<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ViewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('user')
        ->get();
        return view('posts.userview', compact('data'))
        ->with ('i',(request()->input('page', 1) -1) *5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.createuserview');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'fname' => ['required', 'string', 'min:8'],
            'lname' => ['required', 'string', 'min:8'],
            'cid' => ['required', 'string', 'min:13', 'max:13'],
            'phonenumber' => ['required', 'string'] , 
            'level' => ['required']  
        ]);

        User::create([

            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
            'pname' => 'Mr.',
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'cid' => $request['cid'],
            'phone_number' => $request['phonenumber'],
            'authKey' => '0',
            'password_reset' => '0',
            'level' => $request['level'],
            'active' => '1',
        ]);					
        return redirect('userview')
        ->with('success',"เพิ่มข้อมูลผู้ใช้เรียบร้อยแล้ว");	
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = User::find($id);
        return view('posts.edituserview', compact('post'));
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
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'email' => ['required'],
            'fname' => ['required'],
            'lname' => ['required'],
            'cid' => ['required'],
            'phonenumber' => ['required'] , 
            'level' => ['required']  
        ]);



        $user = User::find($id);

        if($request->password == "")
        {
            $request->password = $user->password;
        }
        
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->fname = $request->fname;
        $user->lname  = $request->lname;
        $user->cid = $request->cid;
        $user->phone_number = $request->phonenumber;
        $user->level  = $request->level;
        $user->save();
    return redirect()->route('userview.index')
    ->with('success',"อัพเดตข้อมูลผู้ใช้เรียบร้อยแล้ว");



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('userview')
        ->with('success',"ลบข้อมูลสิทธิบัตรเรียบร้อยแล้ว");
    }
}
