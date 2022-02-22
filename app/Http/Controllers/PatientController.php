<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sex;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('patient')
        ->join('sex','patient.sex','=','sex.code')
        ->get(['patient.*','sex.name']);
        //dd($data);
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


if( $request->pname == "1")
{
    $sexcode = "นาย";

}
else if( $request->pname == "2")
{
   $sexcode = "นาง";
  
}
else if( $request->pname == "3")
{
   $sexcode = "น.ส.";

}

        $datastore = [
            'hn'     => $request['hn'],
            'pname'    => $sexcode,
            'fname'    => $request['fname'],
            'lname'    => $request['lname'],
            'birthday' => $request['birthday'],
            'addpart'  => $request['addpart'],
            'moopart'  => $request['moopart'],
            'tmbpart'  => $request['tmbpart'],
            'amppart'  => $request['amppart'],
            'chwpart'  => $request['chwpart'],
            'hometel'  => $request['hometel'],
            'sex'    => $request['sex'],
            'cid'       => $request['cid'],
            'drugallergy'      => $request['drugallergy'],
            'status'    => $request['status']

        ];

         patient::create($datastore);
         return redirect('admin/home')
         ->with('success',"เพิ่มข้อมูลสิทธิบัตรเรียบร้อยแล้ว");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        return view('adminHome', compact('patient'));
    }

       /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
   // public function edit(patient $patient)
   public function edit($id)
    {
        $post = patient::find($id);
        

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        
        $out->writeln($id);
        $out->writeln($request->hn);
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
       

        if( $request->pname == "1")
        {
            $sexcode = "นาย";
        }
        else if( $request->pname == "2")
        {
           $sexcode = "นาง";
        }
        else if( $request->pname == "3")
        {
           $sexcode = "น.ส.";
        
        }
        $request->pname = $sexcode;

        $patient = patient::find($id);
            $patient->hn       = $request->hn;
            $patient->pname      = $request->pname;
            $patient->fname    = $request->fname;
            $patient->lname       = $request->lname;
            $patient->birthday      = $request->birthday;
            $patient->addpart    = $request->addpart;
            $patient->moopart       = $request->moopart;
            $patient->tmbpart      = $request->tmbpart;
            $patient->amppart    = $request->amppart;
            $patient->chwpart       = $request->chwpart;
            $patient->hometel      = $request->hometel;
            $patient->sex    = $request->sex;
            $patient->cid       = $request->cid;
            $patient->drugallergy      = $request->drugallergy;
            $patient->status    = $request->status;
            $patient->save();
        return redirect()->route('posts.index')
        ->with('success',"อัพเดตข้อมูลสิทธิบัตรเรียบร้อยแล้ว");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$out = new \Symfony\Component\Console\Output\ConsoleOutput();
       // $out->writeln('destroy');
       // $out->writeln($id);
        patient::destroy($id);
        return redirect()->route('posts.index')
        ->with('success',"ลบข้อมูลสิทธิบัตรเรียบร้อยแล้ว");

    }


  
  

}
