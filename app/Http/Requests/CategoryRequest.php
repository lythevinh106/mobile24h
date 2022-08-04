<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "min:1|max:30|required",

        ];
    }


    public function messages()
    {
        return [

            "required" => ":attribute không được bỏ trống",
            "min" => ":attribute tối thiểu có :min kí tự",
            "max" => ":attribute tối đa có :max kí tự",
            "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",


        ];
    }

    public function attributes() // thay doi ten truong
    {

        return [
            "name" => "tên danh mục",




        ];
    }
}
