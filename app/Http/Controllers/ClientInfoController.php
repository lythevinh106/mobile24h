<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\District;
use App\Models\Order;
use App\Models\Order_items;
use App\Models\Province;

class ClientInfoController extends Controller
{
    public function info_show()
    {



        return view("client.info.info", [
            "title" => "Thông Tin Tài Khoản",



        ]);
    }


    public function info_store(Request $request)
    {

        $request->validate(
            [
                "name" => "min:5|max:100|required",


                "address" => "min:6|max:3000|required",
                "phone" => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',


            ],
            [
                "required" => " :attribute không được để trống",

                "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập :attribute khác",
                "min" => ":attribute có tối thiểu :min kí tự",
                "max" => ":attribute có tối đa :max kí tự",
                "regex" => ":attribute không hợp lệ vui lòng nhập :attribute khác",
                "email" => "email không hợp lệ"
            ],
            [
                "name" => "tên xưng hô",
                "email" => "tên email",


                "address" => "Địa Chỉ Của Bạn",
                "phone" => "Số Điện Thoại Của Bạn",

            ]




        );



        $user = User::find(Auth::id());
        $request->except("email");

        $user->fill($request->all());
        $user->save();
        return redirect()->back()->with("success", "Chỉnh Sửa Thông Tin Cá Nhân Thành Công");
    }


    public function info_order_show()
    {

        $orders = Order::where("user_id", Auth::id())->get();
        $arr_order = [];

        foreach ($orders as $order) {

            $arr_order[] = $order->id;
        }

        // dd($arr_order);
        $order_items =  Order_items::whereIn("order_id", $arr_order)->orderby("id", "desc")->paginate(6)->withQueryString();

        // dd($order_items);







        return view(
            "client.info.info_order",
            [
                "title" => "Danh sách Đơn Hàng Của Bạn",
                "order_items" => $order_items
            ]

        );
    }
}
