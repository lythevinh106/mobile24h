<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller
{


    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'info');

            return $next($request);
        });
    }
    public function index()
    {

        $info = Auth::guard("admin")->user();



        return view("admin.info.main", [


            "title" => "Chỉnh Sửa Thông Tin Cá Nhân",
            "info" =>  $info

        ]);
    }


    public function update(Request $request, $id)
    {

        // dd($request->input());
        $info = Auth::guard("admin")->user();

        $request->validate([

            "name" => "min:5|max:100|required|unique:admins,name," . $info->id,

            'email' => 'required|string|email|max:255|unique:admins,email,' . $info->id
        ], [

            "required" => " :attribute không được để trống",

            "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập email khác",
            "min" => ":attribute có tối thiểu :min kí tự",
            "max" => ":attribute có tối đa :max kí tự"
        ], [

            "name" => "tên tài khoản",
            "email" => "tên email",



        ]);

        $query = Admin::find($id);
        $query->fill($request->input());
        $query->save();

        return redirect()->back()->with("success", "chỉnh sửa thông tin cá nhân thành công");
    }

    public function show_password()
    {
        $info = Auth::guard("admin")->user();
        return view("admin.info.password", [


            "title" => "Chỉnh Sửa Mật Khẩu Cá Nhân",
            "info" =>  $info


        ]);
    }


    public function update_password(Request $request, $id)
    {

        $info = Auth::guard("admin")->user();
        $request->validate(
            [

                'old_password' => 'required|min:6|max:30',
                'new_password' => 'required|min:6|max:30|',
                're_new_password' => 'required|min:6|max:30|same:new_password',

            ],
            [
                "required" => " :attribute không được để trống",
                "max" => " :attribute có tối đa :max ki tự",
                "min" => " :attribute có tối thiểu :min ki tự",
                "same" => "mật khẩu nhập lại không khớp với mật khẩu mới đã nhập"
            ],
            [

                "name" => "Tên Đăng Nhập",
                "old_password" => "Mật Khẩu Cũ",
                "new_password" => "Mật Khẩu Mới",
                "re_new_password" => "Mật Khẩu Nhập Lại"


            ]
        );


        $creds = ["name" => $info->name, "password" => $request->input("old_password")];


        if (Auth::guard('admin')->attempt($creds)) {

            Admin::find($info->id)->update([


                "password" => Hash::make($request->input("new_password"))
            ]);


            return redirect()->route('admin.info.show')->with("success", "Sửa Mật Khẩu Thành Công");
        } else {
            return redirect()->back()->with('error', 'Mật Khẩu Cũ Của Bạn Nhâp Không Chính Xác');
        }
    }
}
