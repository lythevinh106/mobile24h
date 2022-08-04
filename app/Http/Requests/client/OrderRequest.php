<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
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
        if (!Auth::check()) {


            return [
                "name" => "min:1|max:300|required",
                "cart_total" => "required",
                // "phone" => "required|regex:/((09|03|07|08|05)+([0-9]{8})\b)/g/",
                "phone" => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
                //  regex:/^([0-9\s\-\+\(\)]*)$/|min:10
                "email" => "email|min:1|max:300|required",
                "address" => "min:1|max:300|required",
                "other" => "max:3000"




            ];
        } else {
            return [];
        }
    }

    public function messages()
    {

        return [

            "required" => ":attribute không được  trống",
            "min" => ":attribute tối thiểu có :min kí tự",
            "max" => ":attribute tối đa có :max kí tự",
            "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",
            "regex" => ":attribute không hợp lệ vui lòng nhập :attribute khác",
            "email" => "email không hợp lệ"



        ];
    }

    public function attributes() // thay doi ten truong
    {

        return [
            "name" => "Tên của bạn",
            "cart_total" => "Giỏ hàng Của Bạn",
            "other" => "Ghi Chú Của Bạn",
            "address" => "Địa Chỉ Của Bạn",
            "phone" => "Số Điện Thoại Của Bạn",




        ];
    }
}
