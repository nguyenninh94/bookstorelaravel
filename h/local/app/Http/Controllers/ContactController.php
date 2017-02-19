<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

	public function __construct()
	{
        $this->middleware('auth');
	}

    public function getContact()
    {
    	return view('contact');
    }

    public function postContact(Request $request)
    {

    }
}
