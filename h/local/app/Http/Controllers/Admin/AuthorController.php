<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Author;
use Validator;
use DB;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{

    public function index()
    {
    	$authors=DB::table('authors')->orderBy('id','DESC')->paginate(4);
    	return view('admin.author.index',compact('authors'));
    }

    public function getAdd()
    {
    	return view('admin.author.add');
    }

    public function postAdd(AuthorRequest $request)
    {
        $validator=Validator($request->all());
        if($validator->fails())
        {
        	return redirect()->back()->withInput()->withErrors($validator);
        }else{
        	$author=new Author();
        	$author->name = $request->name;
        	$author->save();
        	return redirect()->route('admin.author.index')->with('flash','Add Author SuccessFully');
        }
    }

    public function delete($id){
    	$author=Author::find($id);
    	$author->delete($id);
    	return redirect()->route('admin.author.index')->with('flash','Delete Author SuccessFully');
    }

    public function getEdit($id)
    {
       $author=Author::find($id);
       return view('admin.author.edit',compact('author'));
    }

    public function postEdit(Request $request, $id)
    {
        $rules=[
            'name' => [
             'required',
             Rule::unique('authors')->ignore($request->input('name'),'name'), "string","between:0,120"
           ]
        ];
        $messages=[
            'name.required' => 'Bạn chưa nhập tên tác giả',
            'name.unique' => 'Tên tác giả đã tồn tại'
        ];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
        	return redirect()->back()->withErrors($validator);
        }else{
        	$author=Author::findOrFail($id);
        	$author->name = $request->name;
        	$author->save();
        	return redirect()->route('admin.author.index')->with('flash','Edit Author SuccessFully');

        }
    }
}
