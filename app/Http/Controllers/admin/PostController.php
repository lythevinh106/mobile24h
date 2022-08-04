<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trait\admin\PostCategoryService;
use App\Trait\admin\PostService;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use PostCategoryService;
    use PostService;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'post');

            return $next($request);
        });
    }
    public function index(Request $request)

    {


        $list_post = $this->list_posts($request);

        return view("admin.post.list", [


            "title" => "Danh Sách Bài Viết",
            "posts" => $list_post


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post_categories = $this->list_post_categories();
        return view("admin.post.add", [


            "title" => "Thêm Bài Viết",
            "post_categories" => $post_categories


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
        return $this->create_post($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->show_post($id);

        $post_categories = $this->list_post_categories();



        return view("admin.post.edit", [

            "post" => $post,

            "post_categories" => $post_categories,
            "title" => "Sửa Tiêu Đề"


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


        return  $this->update_post($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {


        $result =  $this->delete_post($request->input("id"));
        if ($result != false) {
            return response()->json([

                "error" => false,
                "message" => "Xóa thành công"




            ]);
        } else {
            return response()->json([

                "error" => true,




            ]);
        }
    }
}
