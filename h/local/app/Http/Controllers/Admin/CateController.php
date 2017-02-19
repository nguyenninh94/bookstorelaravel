<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CateRequest;
use Validator;
use DB;
use Illuminate\Validation\Rule;

class CateController extends Controller
{
    public function index()
    {
    	$cates=DB::table('categories')->orderBy('id','DESC')->paginate(5);
    	return view('admin.category.index',compact('cates'));
    }

    public function getAdd()
    {
    	$parent=Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.category.add',compact('parent'));
    }

    public function postAdd(CateRequest $request)
    {
 
        $validator=Validator($request->all());
        if($validator->fails())
        {
        	return redirect()->back()->withInput()->withErrors($validator);
        }else{
        	$cate=new Category();
        	$cate->name = $request->name;
        	$cate->parent_id = $request->cate_parent;
        	$cate->save();
        	return redirect()->route('admin.cate.index')->with('flash','Add Category SuccessFully');
        }
    }

    public function delete($id)
    {
    	$parent=DB::table('categories')->where('parent_id','=',$id)->count();
    	if($parent == 0)
    	{
    		$cate=Category::findOrFail($id);
    		$cate->delete($id);
    		return redirect()->route('admin.cate.index')->with('flash','Delete Category SuccessFully');
    	}else{
    		echo"<script type='text/javascript'>
                 alert('Sorry!You can not delete this category ');
                 window.location='";
                    echo route('admin.cate.index');
                 echo"'
            </script>";
    	}
    }

    public function getEdit($id)
    {
        $cate=Category::findOrFail($id)->toArray();
        $parent=Category::all()->toArray();
        return view('admin.category.edit',compact('cate','parent','id'));
    }

    public function postEdit(Request $request, $id)
    {
        $rules=[
           'name' => [
             'required',
             Rule::unique('categories')->ignore($request->input('name'),'name'), "string","between:0,120"
           ] 
        ];
        $messages=[
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại'
        ];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
        	return redirect()->back()->withErrors($validator);
        }else{
        	$cate=Category::findOrFail($id);
        	$cate->name = $request->name;
        	$cate->parent_id = $request->cate_parent;
        	$cate->save();
        	return redirect()->route('admin.cate.index')->with('flash','Edit Category SuccessFully');
        }

    }
}
