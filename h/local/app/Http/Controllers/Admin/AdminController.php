<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Validator;
use Hash;
use DB;
use Auth;
use Illuminate\Validation\Rule;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {
    	$admins=DB::table('admins')->orderBy('id','DESC')->get();
    	return view('admin.admin.index',compact('admins'));
    } 

    public function getAdd()
    {
    	return view('admin.admin.add');
    }

    public function postAdd(AdminRequest $request)
    {
        $validator=Validator($request->all());
        if($validator->fails())
        {
        	return redirect()->back()->withInput()->withErrors($validator);
        }else{
        	$admin=new Admin();
        	$admin->name = $request->name;
        	$admin->username = $request->username;
        	$admin->email = $request->email;
        	$admin->password = Hash::make($request->password);
        	$admin->save();
        	return redirect()->route('admin.admin.index')->with('flash','Add Admin SuccessFully');
        }
    }

    public function delete($id)
    {
      $admin_login = Auth::guard('admin')->user()->id;
      $admin = Admin::findOrFail($id);
      if($id==2 || $admin_login!=2){
         return redirect()->back()->with('flash','Sory!You can not access delete admin');
      }else{
        $admin->delete($id);
        return redirect()->back()->with('flash','Delete Admin Successfully');
      }
    }

    public function getEdit($id)
    {
       $admin = Admin::findOrFail($id);
       if((Auth::guard('admin')->user()->id !=2) && ($id ==2 || Auth::guard('admin')->user()->id != $id)){
          return redirect()->route('admin.admin.index')->with('flash','You can not access to edit this User');
       }
       return view('admin.admin.edit',compact('admin'));
    }


    public function postEdit(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        if(!empty($request->input('password')))
        {
          $this->validate($request,[
              'password' => 'min:8|confirmed'
            ],
            [
              'password.min' => 'Mật khẩu phải ít nhất 8 ký tự',
              'password.confirmed' => 'Mật khẩu xác nhận không chính xác'
            ]);
           $admin->password = Hash::make($request->input('password'));
        }
      $rules = [
         'name' => 'required',
         'username' => [
            'required',
             Rule::unique('admins')->ignore($request->username,'username'), "string","between:0,120"
         ],
         'email' => [
             'required','email',
             Rule::unique('admins')->ignore($request->email,'email'), "string","between:0,120"
         ]
      ];
      $messages = [
         'name.required' => 'Bạn chưa nhập tên',
         'username.required' => 'Bạn chưa nhập tên tài khoản',
         'username.unique' => 'Tên tài khoản đã tồn tại',
         'email.required' => 'Bạn chưa nhập email',
         'email.email' => 'Email không đúng định dạng',
         'email.unique' => 'Email đã tồn tại'
      ];
      $validator=Validator::make($request->all(),$rules,$messages);
      if($validator->fails())
        {
          return redirect()->back()->withInput()->withErrors($validator);
        }else{
          $admin->name = $request->name;
          $admin->username = $request->username;
          $admin->email = $request->email;
          $admin->save();
          return redirect()->route('admin.admin.index')->with('flash','Edit Admin SuccessFully');
        }
    }
}
