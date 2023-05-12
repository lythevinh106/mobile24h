<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Trait\ClientUserService;
use GuzzleHttp\Promise\Create;
use App\Models\Session_users;
use Illuminate\Support\Facades\DB;

class ClientAuthController extends Controller
{
    use ClientUserService;

    public function show_login(Request $request)
    {

        // dd($request->input());

        return view("client.auth.login", [
            "title" => "Đăng Nhập"
        ]);
    }



    public function show_register(Request $request)
    {

        // dd($request->input());

        $provinces = Province::all();
        $districts = Province::find(1)->districts;



        return view("client.auth.register", [
            "title" => "Đăng Ký",
            "provinces" =>  $provinces,
            "districts" => $districts
        ]);
    }

    public function register_store(Request $request)
    {


        $request->validate(
            [
                "name" => "min:5|max:100|required",
                "email" => "required|unique:users,email|email|min:10|",
                "password" => "min:6|max:30|required",
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
                "name" => "tên tài khoản",
                "email" => "tên email",
                "password" => "mật khẩu",

                "address" => "Địa Chỉ Của Bạn",
                "phone" => "Số Điện Thoại Của Bạn",

            ]




        );





        return $this->create_user($request);
    }

    public function register_alert()
    {


        return view("client.auth.alert", ["title" => "Vui Lòng Xác Nhận Email"]);
    }

    public function register_verified(Request $request)
    {
        //  dd($request->input());

        $user = User::find($request->input("id"));

        if ($user->email_token == $request->input("token")) {

            $user->email_verified = 1;
            $user->save();

            Session_users::create([
                "user_id" => $user->id,
                "total" => 0

            ]);
        }
        return redirect()->route("client.login")->with("success", "Bạn Đã Xác Thực Tài Khoản Thành Công, Vui lòng Đăng Nhập");
    }


    public function check(Request $request)
    {


        $request->validate(
            [
                'email' => "required|min:6|max:30|",
                'password' => 'required|min:6|max:30',

            ],
            [
                "required" => " :attribute không được để trống",
                "max" => " :attribute có tối đa :max ki tự",
                "min" => " :attribute có tối thiểu :min ki tự",
            ],
            [

                "email" => "Email",
                "password" => "Mật Khẩu"

            ]
        );

        // dd($request->input());
        $data = [

            "email" => $request->input("email"),
            "password" => $request->input("password"),
            "email_verified" => 1
        ];


        // dd(Hash::make("1061998aA"));

        // dd(Auth::guard('admin')->attempt($creds));


        if (Auth::attempt($data, $request->input("remember"))) {
            Cart::destroy();


            return redirect()->route("client.home")->with("success", "chúc mừng bạn đã đăng Nhập thành công");
        } else {
            return redirect()->back()->with('error', 'Tên Đăng Nhập hoặc Mật Khẩu không chính xác');
        }
    }



    public function logout()
    {

        Auth::logout();
        Cart::destroy();

        return redirect()->route("client.home");
    }


    public function forget_password()
    {

        return view("client.auth.forget", [
            "title" => "Lấy Lại Mật kHẩu"
        ]);
    }

    public function take_password(Request $request)
    {

        $request->validate(
            [
                'email' => "required|min:6|max:30|",


            ],
            [
                "required" => " :attribute không được để trống",
                "max" => " :attribute có tối đa :max ki tự",
                "min" => " :attribute có tối thiểu :min ki tự",
            ],
            [

                "email" => "Email",


            ]
        );


        return $this->take_password_forget($request);
    }


    public function store_forget_password(Request $request)
    {
        $user = User::find($request->input("id"));

        if ($user->remember_token == $request->input("remember_token")) {
            return view("client.auth.take_password", [
                "title" => "Thêm Lại Mật Khẩu Mới",
                "email" => $user->email,
                "user_id" => $user->id
            ]);

            // return redirect()->route("client.store.take_password")
        } else {
            dd("sdad");
        }
    }

    public function store_take_password(Request $request, $id)
    {

        $request->validate(
            [
                'password' => "required|min:6|max:30|",


            ],
            [
                "required" => " :attribute không được để trống",
                "max" => " :attribute có tối đa :max ki tự",
                "min" => " :attribute có tối thiểu :min ki tự",
            ],
            [

                "password" => "Mật Khẩu",


            ]
        );

        $user = User::Find($id);

        $password =  Hash::make($request->input("password"));

        $user->password = $password;
        $user->save();
        return redirect()->route("client.login")->with("success", "Mật Khẩu mới đã được lưu thành công bạn có thể đăng nhập tại đây");
    }
}
