<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Trait\admin\OrderAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    use OrderAdminService;
    public function index()
    {


        return redirect()->route("admin.order.list");
    }

    public function login()
    {




        return view("admin.login");
    }


    public function check(Request $request)
    {

        // ;
        // dd($request->input());

        $request->validate(
            [
                'name' => "required|min:6|max:30|",
                'password' => 'required|min:6|max:30',

            ],
            [
                "required" => " :attribute không được để trống",
                "max" => " :attribute có tối đa :max ki tự",
                "min" => " :attribute có tối thiểu :min ki tự",
            ],
            [

                "name" => "Tên Đăng Nhập",
                "password" => "Mật Khẩu"

            ]
        );

        $creds = $request->only('name', 'password');




        // dd(Hash::make("1061998aA"));

        // dd(Auth::guard('admin')->attempt($creds));


        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Tên Đăng Nhập hoặc Mật Khẩu không chính xác');
        }
    }


    public function logout()
    {

        Auth::guard("admin")->logout();
        return redirect()->route("admin.login");
    }
}
