<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ini_set('memory_limit', '1M');
        // $var = "".(memory_get_peak_usage(true)/1024/1024)." MiB\n\n";
        // return $var;
        
        return view('home');
    }
}
