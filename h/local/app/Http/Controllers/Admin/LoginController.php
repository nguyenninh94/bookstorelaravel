<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function getLogin()
    {
    	return view('admin.login.login');
    }

    public function postLogin(Request $request)
    {
    	$rules=[
          'email'=>'required|email',
          'password'=>'required|min:8'
    	];
    	$messages=[
           'email.required'=>'Bạn chưa nhập email',
           'email.email'=>'Email không dúng định dạng',
           'password.required'=>'Bạnn chưa nhập mật khẩu',
           'password.min'=>'Mật khẩu phải ít nhất 8 ký tự'
    	];
    	$validator=Validator::make($request->all(),$rules,$messages);
    	if($validator->fails())
    	{
    		return redirect()->back()->withInput()->withErrors($validator);
    	}else{
            $email=$request->input('email');
            $password=$request->input('password');
    		if(Auth::guard('admin')->attempt(['email'=>$email, 'password'=>$password]))
    		{
    			return redirect()->intended('admin/dashboard');
    		}else{
    			$errors=new MessageBag(['errorlogin'=>'Email hoặc mật khẩu không chính xác!']);
    			return redirect()->back()->withErrors($errors);
    		}
    	}
    }
}