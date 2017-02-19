<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Validation\Rule;
use Validator;
use Hash;

class ProfileController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth',['except'=>'updateProfile']);
	}

    public function index()
    {
    	return view('profile');
    }

    public function profile($id)
    {
    	$user = User::findOrFail($id);
    	return view('auth.updateProfile',compact('user'));
    }

    public function update(Request $request,$id)
    {
    	$user = User::findOrFail($id);
        if(!empty($request->input('password'))){
        	$this->validate($request,[
               'password' => 'min:8|confirmed'
        		],
        	   [
                 'password.min' => 'Mật khẩu phải ít nhất 8 ký tự',
                 'password.confirmed' => 'Mật khẩu xác nhận không chính xác'
          		]);
            $user->password = Hash::make($request->input('password'));
        }
        $rules = [
         'name' => 'required',
         'username' => [
            'required',
             Rule::unique('users')->ignore($request->username,'username'), "string","between:0,120"
         ],
         'email' => [
             'required','email',
             Rule::unique('users')->ignore($request->email,'email'), "string","between:0,120"
         ]
        ];
        $messages = [
         'name.required' => 'Bạn chưa nhập tên',
         'username.required' => 'Bạn chưa nhập tên tài khoản',
         'username.unique' => 'Tên tài khoản đã tông tại',
         'email.required' => 'Bạn chưa nhập email',
         'email.email' => 'Email không đúng định dạng',
         'email.unique' => 'Email đã tồn tại'
      ];

      $validator=Validator::make($request->all(),$rules,$messages);
      if($validator->fails())
        {
          return redirect()->back()->withInput()->withErrors($validator);
        }else{
          $user->name = $request->name;
          $user->username = $request->username;
          $user->email = $request->email;
          $user->save();
          return redirect('/profile')->with('message','Update Information SuccessFully');
        }
    }
}
