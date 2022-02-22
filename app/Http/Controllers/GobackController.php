<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class GobackController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('patient')->get();
        return view('home', compact('data'))
        ->with ('i',(request()->input('page', 1) -1) *5)
        ->with('is_admin',auth()->user()->level);
    }
}
