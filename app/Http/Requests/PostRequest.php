<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "name" => "min:3|max:500|required",

            "title" => "min:3|max:1000|required",
            "feature_image" => "required",
            "content" => "min:3|required",

        ];
    }


    public function messages()
    {
        return [

            "required" => ":attribute không được bỏ trống",
            "min" => ":attribute tối thiểu có :min kí tự",
            "max" => ":attribute tối đa có :max kí tự",
            "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",

            "mimes" => ":attribute phải là ảnh là jpg,jpeg,png",



        ];
    }

    public function attributes() // thay doi ten truong
    {

        return [
            "name" => "tên sản phẩm",
            "title" => "mô tả sản phẩm",

            "feature_image" => "ảnh đại diện ",

            "content" => "nội dung"



        ];
    }
}
