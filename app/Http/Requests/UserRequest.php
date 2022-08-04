<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => "min:5|max:100|required|unique:admins,name",
            "email" => "unique:admins,email|email|min:10|",
            "password" => "min:6|max:30|required",
            "role_id" => "required|min:1"


        ];
    }


    public function messages()
    {
        return [

            "required" => " :attribute không được để trống",

            "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập email khác",
            "min" => ":attribute có tối thiểu :min kí tự",
            "max" => ":attribute có tối đa :max kí tự"


        ];
    }

    public function attributes() // thay doi ten truong
    {

        return [

            "name" => "tên tài khoản",
            "email" => "tên email",
            "password" => "mật khẩu",
            "role_id" => "Mục Quyèn Hạn"


        ];
    }
}
