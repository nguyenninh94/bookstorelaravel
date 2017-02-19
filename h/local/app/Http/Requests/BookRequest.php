<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'cate' => 'required',
          'author' => 'required',
          'name' => 'required|unique:books',
          'qty' => 'required|numeric',
          'price' => 'required|numeric',
          'discount' => 'required|numeric',
          'image' => 'required|image|max:2048',
          'publisher' => 'required',
          'day' => 'required',
          'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
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
          'image.required' => 'Bạn chưa chọn hình ảnh',
          'image.image' => 'Image không đúng định dạng',
          'image.max' => 'Kích thước ảnh quá lớn',
          'publisher.required' => 'Bạn chưa nhập tên nhà xuất bản',
          'day.required' => 'Bạn chưa nhập ngày xuất bản',
          'content.required' => 'Bạn chưa nhập mô tả về sách'
        ];
    }
}
