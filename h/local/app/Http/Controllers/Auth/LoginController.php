<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request)
    {
        $rules=[
           'email' => 'required|email',
           'password' => 'required',
        ];
        $messages=[
           'email.required' => 'Bạn chưa nhập email',
           'email.email' => 'Email không đúng định dang',
           'password.required' => 'Bạn chưa nhập mật khẩu'
        ];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
                ], 200);
        }else{
            $email = $request->input('email');
            $password = $request->input('password');
            if(Auth::guard('web')->attempt(['email'=>$email , 'password'=>$password,'verified'=>true]))
            {
               return response()->json([
                  'error' =>false,
                  'message'=> 'Đăng nhập thành công'
                ], 200);
            }else{
                $errors =new MessageBag(['errorlogin'=>'Email hoặc mật khẩu không chính xác!']);
                 return response()->json([
                'error' => true,
                'message' => $errors
                ], 200);
            }
        }
    }
}
