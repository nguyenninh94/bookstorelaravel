<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $books =DB::table('books')->orderBy('id','DESC')->get();
        return view('home', compact('books'));
    }

    public function pagenotfound()
    {
        return view('errors.404');
    }
}