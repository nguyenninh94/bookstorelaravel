<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class UserController extends Controller
{
    public function index()
    {
    	$users = DB::table('users')->orderBy('id','DESC')->get();
    	return view('admin.user.index',compact('users'));
    }

    public function delete($id)
    {
    	$user = User::findOrFail($id);
    	$user->delete($id);
    	return redirect()->route('admin.user.index')->with('flash','Delete User Successfully');
    }
}
