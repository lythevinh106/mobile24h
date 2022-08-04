<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'tag');

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $tags = Tag::all();






        return view("admin.tag.list", [


            "title" => "Danh Tag Sách Sản Phẩm",
            "tags" => $tags



        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view("admin.tag.add", [

            "title" => "Thêm Tag Sản Phẩm",


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                "name" => "required|min:1|max:100|unique:tags,name"
            ],
            [

                "required" => " :attribute không được để trống",

                "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập  lại",
                "min" => ":attribute có tối thiểu :min kí tự",
                "max" => ":attribute có tối đa :max kí tự"
            ],
            [

                "name" => "tên tag sản phẩm",




            ]
        );


        $request->except("_token");
        Tag::create($request->all());
        return redirect()->back()->with("success", "Thêm Tag sản phẩm thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view("admin.tag.edit", [

            "title" => "Sửa tag sản phẩm",
            "tag" => $tag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            [
                "name" => "required|min:1|max:100|unique:tags,name," . $id
            ],
            [

                "required" => " :attribute không được để trống",

                "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập  lại",
                "min" => ":attribute có tối thiểu :min kí tự",
                "max" => ":attribute có tối đa :max kí tự"
            ],
            [

                "name" => "tên tag sản phẩm",




            ]
        );

        $query = Tag::find($id);
        $query->fill($request->input());
        $query->save();

        return redirect()->back()->with("success", "cập nhật tag sản phẩm  thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $result = true;

        try {

            Tag::where("id", $request->input("id"))->delete();
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
