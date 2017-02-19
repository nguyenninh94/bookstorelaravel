<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('admin.dashboard',['except'=>'logout']);
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }
}
