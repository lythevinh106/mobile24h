<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post_category;
use Illuminate\Http\Request;
use App\Trait\admin\PostCategoryService;
use Illuminate\Support\Facades\Session;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use PostCategoryService;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'post');


            return $next($request);
        });
    }
    public function index()
    {
        $post_categories = $this->list_post_categories();

        // dd($categories);
        return view("admin.post_category.list", [


            "title" => "Danh Sách Danh Mục",
            "post_categories" => $post_categories

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parents = $this->get_list_parent_post_category();

        return view(
            "admin.post_category.add",
            [
                "title" => "Thêm Danh Mục Bài Viết",
                "parents" => $parents

            ]
        );
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

                "name" => "min:3|max:30|required|unique:post_categories,name",
            ],
            [

                "required" => ":attribute không được bỏ trống",
                "min" => ":attribute tối thiểu có :min kí tự",
                "max" => ":attribute tối đa có :max kí tự",
                "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",


            ],

            [
                "name" => "tên danh mục",




            ]
        );
        return $this->create_post_category($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post_category = $this->show_post_category($id);
        $parents = $this->get_list_parent_post_category();



        return view(
            "admin.post_category.edit",
            [
                "title" => "Sửa Danh Mục Bài Viết",
                "post_category" => $post_category,
                "parents" => $parents


            ]

        );
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

                "name" => "min:3|max:30|required|unique:post_categories,name," . $id,
            ],
            [

                "required" => ":attribute không được bỏ trống",
                "min" => ":attribute tối thiểu có :min kí tự",
                "max" => ":attribute tối đa có :max kí tự",
                "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",


            ],

            [
                "name" => "tên danh mục",




            ]
        );
        return $this->update_post_category($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $arr_children = [];
        if (Post_category::where("parent_id", $request->input("id"))->first()) {
            $list_children_deleted = Post_category::where("parent_id", $request->input("id"))->get();

            foreach ($list_children_deleted as $value) {

                $arr_children[] = $value->id;
            }
        }

        $result =  $this->delete_post_category($request->input("id"));


        if ($result != false) {
            return response()->json([

                "error" => false,
                "message" => "Xóa thành công",
                "list_children_deleted" => $arr_children




            ]);
        } else {
            return response()->json([

                "error" => true,




            ]);
        }
    }
}
