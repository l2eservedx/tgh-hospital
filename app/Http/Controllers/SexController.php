<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $data =  DB::table('patient')->get();

       $data =  DB::table('patient')
       ->join('sex','patient.id','=','sex.id')
       ->get();
        return view('adminHome', compact('data'))
        ->with ('i',(request()->input('page', 1) -1) *5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request['sex']);

        if($request['sex'] == "ชาย")
        {
            $sexcode = "1";
        }
        else
        {
            $sexcode = "2";
        }
        
        $sex=[[
            'code' => $sexcode,
            'name' => $request['sex'],
            'active' => '0'
        ]];
        foreach ($sex as $key => $value)
        {
            Sex::create($value);
        }

        $request->validate([
            'hn' =>'required',
            'pname' =>'required',
            'fname' =>'required',
            'lname' =>'required',
            'birthday' =>'required',
            'addpart' =>'required',
            'moopart' =>'required',
            'tmbpart' =>'required',
            'amppart' =>'required',
            'chwpart' =>'required',
            'hometel' =>'required',
            'sex' =>'required',
            'cid' =>'required',
            'drugallergy' =>'required',
            'status' =>'required'
        ]);
        patient::create($request->all());
        return redirect('admin/home')
        ->with('success',"เพิ่มข้อมูลสิทธิบัตรเรียบร้อยแล้ว");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sex  $sex
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        return view('adminHome', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    
    public function edit(patient  $patient)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        foreach($patient as $key=>$value)
        {
            $out->write('Key : ');
            $out->writeln($key);
            $out->write('value : ');
            $out->writeln($value);
        }
        

        return view('posts.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sex  $sex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'hn' =>'required',
            'pname' =>'required',
            'fname' =>'required',
            'lname' =>'required',
            'birthday' =>'required',
            'addpart' =>'required',
            'moopart' =>'required',
            'tmbpart' =>'required',
            'amppart' =>'required',
            'chwpart' =>'required',
            'hometel' =>'required',
            'sex' =>'required',
            'cid' =>'required',
            'drugallergy' =>'required',
            'status' =>'required'
        ]);
        $patient->update($request-all());
        return redirect()->route('posts.index')
        ->with('success',"Patient Update Success.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sex  $sex
     * @return \Illuminate\Http\Response
     */
    public function destroy(patient $patient)
    {
        $patient->delete();
        return redirect()->route('adminHome')
        ->with('success',"OK");
    }
}
