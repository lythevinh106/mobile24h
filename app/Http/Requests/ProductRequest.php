<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name" => "min:3|max:60|required",
            "price" => "min:3|integer|gt:price_sale",
            "price_sale" => "min:3|integer",
            "title" => "min:3|max:300|required",
            "feature_image" => "required",
            "feature_image.*" => "required",
            "small_image" => "required",
            "small_image.*" => "max:10000",
            "content" => "",
            "number_product_quantity" => "min:0|max:6000|required|integer"


        ];
    }


    public function messages()
    {
        return [

            "required" => ":attribute không được bỏ trống",
            "min" => ":attribute tối thiểu có :min kí tự",
            "max" => ":attribute tối đa có :max kí tự",
            "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",
            "numeric" => ":attribute phải là kiểu số",
            "mimes" => ":attribute phải là ảnh là jpg,jpeg,png",
            // "gt" => ":attribute phải lớn hơn :value "
            "gt" => ":attribute phải lớn hơn gia khuyến mãi "


        ];
    }

    public function attributes() // thay doi ten truong
    {

        return [
            "name" => "tên sản phẩm",
            "title" => "mô tả sản phẩm",
            "price" => "giá sản phẩm",
            "price_sale" => "giá khuyến mãi sản phẩm",
            "feature_image" => "ảnh đại diện ",
            "small_image" => "các ảnh nhỏ liên quan",
            "content" => "nội dung",
            "number_product_quantity" => "Số Lượng Sản Phẩm"



        ];
    }
}
