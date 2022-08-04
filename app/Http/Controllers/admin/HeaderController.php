<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;

class HeaderController extends Controller
{

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'header');

            return $next($request);
        });
    }
    public function show_edit_banner()
    {

        $check_row = 0;
        if (Banner::first()) {

            $check_row = 1;
        }
        $list_banners = Banner::all();


        return view("admin.header.banner.edit", [


            "title" => " Tùy Chỉnh Banner Đầu Trang",
            "check_row" => $check_row,
            "banners" => $list_banners,


        ]);
    }


    public function store_banner(Request $request)
    {
        $request->except("active");
        Banner::create($request->all());
        return redirect()->route("admin.header.edit_banner")->with("success", "Thêm Banner đàu trang thành công");
    }

    public function create_banner()
    {

        return view("admin.header.banner.add", [


            "title" => "Thêm Banner Đầu Trang",

        ]);
    }

    public function update_banner(Request $request)
    {
        // dd($request->input("active"));

        Banner::where("id", ">", 0)->update([

            "active" => 0
        ]);

        Banner::where("id", $request->input("active"))->update([

            "active" => 1
        ]);

        return redirect()->back()->with("success", "Thiết Lập Banner Hiển Thị Thành Công");
    }

    public function delete_banner(Request $request)
    {

        // dd($request->input);
        $result = true;

        try {

            Banner::where("id", $request->input("id"))->delete();
        } catch (\Exception $err) {
            $result = false;
        }



        if ($result != false) {
            return response()->json([

                "error" => false,
                "message" => "Xóa thành công",





            ]);
        } else {
            return response()->json([

                "error" => true,




            ]);
        }
    }

    ////slider


    public function create_slider()
    {

        return view("admin.header.slider.add", [


            "title" => "Thêm Slider Đầu Trang",

        ]);
    }


    public function store_slider(Request $request)
    {
        $request->except("active");
        Slider::create($request->all());
        return redirect()->route("admin.header.edit_slider")->with("success", "Thêm Slider đàu trang thành công");
    }






    public function show_edit_slider()
    {

        $check_row = 0;
        if (Slider::first()) {

            $check_row = 1;
        }
        $list_sliders = Slider::all();


        return view("admin.header.slider.edit", [


            "title" => " Tùy Chỉnh Slider Đầu Trang",
            "check_row" => $check_row,
            "sliders" => $list_sliders,


        ]);
    }


    public function update_slider(Request $request)
    {
        // dd($request->input());

        Slider::where("id", ">", 0)->update([

            "active" => 0
        ]);
        foreach ($request->input("active") as $value) {

            Slider::where("id", $value)->update([

                "active" => 1
            ]);
        }

        return redirect()->back()->with("success", "Thiết Lập Slider Hiển Thị Thành Công");
    }






    public function delete_slider(Request $request)
    {

        // dd($request->input);
        $result = true;

        try {

            Slider::where("id", $request->input("id"))->delete();
        } catch (\Exception $err) {
            $result = false;
        }



        if ($result != false) {
            return response()->json([

                "error" => false,
                "message" => "Xóa thành công",





            ]);
        } else {
            return response()->json([

                "error" => true,




            ]);
        }
    }
}
