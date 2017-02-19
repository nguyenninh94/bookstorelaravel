<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Author;
use App\Book;
use Validator;
use DB;
use Auth;
use File;
use Illuminate\Validation\Rule;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->orderBy('id','DESC')->paginate(5);
    	return view('admin.book.index',compact('books'));
    }

    public function getAdd()
    {
    	$cates = Category::select('id','name','parent_id')->get();
    	
        $authors = Author::select('id','name')->orderBy('id','DESC')->get();
    	return view('admin.book.add',compact('cates','authors'));
    }

    public function postAdd(BookRequest $request)
    {
        $validator = Validator($request->all());

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $book = new Book();
            $img = time().".".$request->file('image')->getClientOriginalExtension();
            $book->name = $request->input('name');
            $book->alias = changeTitle($request->input('name'));
            $book->qty = $request->input('qty');
            $book->price = $request->input('price');
            $book->discount = $request->input('discount');
            $book->publisher = $request->input('publisher');
            $book->day_publish = $request->input('day');
            $book->cate_id = $request->input('cate');
            $book->author_id = $request->input('author');
            $book->content = $request->input('content');
            $book->admin_id = Auth::guard('admin')->user()->id;
            $book->image = $img;

            $request->image->move('upload',$img);
            $book->save();
            return redirect()->route('admin.book.index')->with('flash','Add Book Successfully');
        }
    }

    public function delete($id)
    {
      $book = Book::findOrFail($id);
      File::delete('public/upload/'.$book->image);
      $book->delete($id);
      return redirect()->route('admin.book.index')->with('flash','Delete Book Successfully');
    }

    public function getEdit($id)
    {
      $cate = Category::select('id','name','parent_id')->get();
      $book = Book::findOrFail($id);
      $authors = Author::select('id','name')->get();
      return view('admin.book.edit',compact('cate','book','authors'));
    }

    public function postEdit(Request $request, $id)
    {
                $rules = [
          'cate' => 'required',
          'author' => 'required',
          'name' => ['required',
            Rule::unique('books')->ignore($request->name,'name'), "string","between:0,120"],
          'qty' => 'required|numeric',
          'price' => 'required|numeric',
          'discount' => 'required|numeric',
          'image' => 'image:ipg,png,gif|max:2048',
          'publisher' => 'required',
          'day' => 'required',
          'content' => 'required',
        ];
        $messages = [
          'cate.required' => 'Bạn chưa chon danh mục',
          'author.required' => 'Bạn chưa nhập tên tác giả',
          'name.required' => 'Bạn chưa nhập tên sách',
          'name.unique' => 'Tên sách đã tồn tại',
          'qty.required' => 'Bạn chưa nhập số lượng',
          'qty.numeric' => 'Số lượng nhập vào phải là kiểu số',
          'price.required' => 'Bạn chưa nhập giá sách',
          'price.numeric' => 'Số lượng sách phải là kiểu số',
          'discount.required' => 'bạn chưa nhập chiết khấu',
          'discount.numeric' => 'Chiết khấu nhập vào phải là kiểu số',
          'image.image' => 'Image không đúng định dạng',
          'image.max' => 'Kích thước ảnh quá lớn',
          'publisher.required' => 'Bạn chưa nhập tên nhà xuất bản',
          'day.required' => 'Bạn chưa nhập ngày xuất bản',
          'content.required' => 'Bạn chưa nhập mô tả về sách'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $book = Book::findOrFail($id);
            $book->name = $request->input('name');
            $book->alias = changeTitle($request->input('name'));
            $book->qty = $request->input('qty');
            $book->price = $request->input('price');
            $book->discount = $request->input('discount');
            $book->publisher = $request->input('publisher');
            $book->day_publish = $request->input('day');
            $book->cate_id = $request->input('cate');
            $book->author_id = $request->input('author');
            $book->content = $request->input('content');
            $book->admin_id = Auth::guard('admin')->user()->id;

            $img_current = 'public/upload/'.$request->input('img_current');
            if(!empty($request->file('image')))
            {
              $img = time().".".$request->file('image')->getClientOriginalExtension();
              $book->image = $img;
              $request->file('image')->move(public_path('upload'),$img);
              if(File::exists($img_current)){
                File::delete($img_current);
              }else{
                echo "File Not Exists";
              }
            }
            $book->save();
            return redirect()->route('admin.book.index')->with('flash','Edit Book Successfully');
        }
    }
}
