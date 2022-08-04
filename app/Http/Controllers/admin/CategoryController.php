<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Trait\admin\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    use SoftDeletes;

    use CategoryService;


    public function __construct()
    {


        $this->middleware(function ($request, $next) {

            Session::put('module_active', 'category');

            return $next($request);
        });
    }

    public function index()
    {

        $categories = $this->list_categories();

        // dd($categories);
        return view("admin.category.list", [


            "title" => "Danh Sách Danh Mục Sản Phẩm",
            "categories" => $categories

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = $this->get_parent();
        return view("admin.category.add", [

            "title" => "Thêm Danh Mục",
            "parents" => $parents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        return $this->create_category($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->show_category($id);
        $parents = $this->get_parent();



        return view(
            "admin.category.edit",
            [
                "title" => "Sửa Danh Mục Sản Phẩm",
                "category" => $category,
                "parents" => $parents


            ]

        );
        return view("admin.user.edit");
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
                "name" => "min:1|max:100|required",



            ],
            [

                "required" => " :attribute không được để trống",


                "min" => ":attribute có tối thiểu :min kí tự",
                "max" => ":attribute có tối đa :max kí tự",
                "unique" => ":attribute đã tồn tại trong hệ thống"


            ],
            [
                "name" => "tên danh mục",

            ]






        );
        return $this->update_category($request, $id);
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
        if (Category::where("parent_id", $request->input("id"))->first()) {
            $list_children_deleted = Category::where("parent_id", $request->input("id"))->get();

            foreach ($list_children_deleted as $value) {

                $arr_children[] = $value->id;
            }
        }

        $result =  $this->delete_category($request->input("id"));

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
