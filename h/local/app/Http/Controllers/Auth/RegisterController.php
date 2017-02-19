<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\confirmationEmail;
use DB;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',
            'name.max' => 'Tên quá dài',
            'username.required' => 'Bạn chưa nhập tên tài khoản',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dang',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải ít nhất 8 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không chính xác',
            'g-recaptcha-response.required' => 'Bạn cần tích vào ô trống để xác thực'
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $user = $this->create($request->all());
            Mail::to($user->email)->send(new ConfirmationEmail($user));

            return redirect()->back()->with('status','Vui lòng kiểm tra email xác nhận để hoàn tất việc đăng ký!');
        }
    }

    public function userConfirm($token)
    {
        $check = DB::table('users')->where('token',$token)->first();
        if(!is_null($check)){
            $user = User::find($check->id);
            if($user->verified == 1){
                return redirect('/login')->with('status','Bạn đã hoàn tất việc đăng ký rồi!Hãy đăng nhập !');
            }
            $user->update(['verified'=>1]);
            return redirect('/login')->with('status','Bạn đã hoàn tất việc đăng ký!Hãy đăng nhập !');
        }
        return redirect()->to('/login')->with('warning','Thông tin xác nhận của bạn không chính xác !');
    }
}
