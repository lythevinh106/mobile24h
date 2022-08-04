<?php

namespace App\Trait\admin;

use App\Models\Category;
use App\Models\Post_categories;
use App\Models\Post_category;

trait PostCategoryService
{


    public function get_list_parent_post_category()
    {

        $parents = Post_category::where("parent_id", 0)->get();

        return $parents;
    }

    public function create_post_category($request)
    {


        try {

            Post_category::create([

                "name" => $request->input("name"),
                "parent_id" => $request->input("parent_id"),
                "active" => $request->input("active"),


            ]);

            return redirect()->back()->with("success", "Thêm Danh Mục Bài Viết Thành Công Thành Công");
        } catch (\Exception $err) {

            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }

    public function list_post_categories()
    {

        $list_post_categories = Post_category::all();



        return  $list_post_categories;
    }


    public function delete_post_category($id)
    {

        try {

            return Post_category::where("id", $id)->orWhere('parent_id', $id)->delete();
        } catch (\Exception $err) {
            return false;
        }
    }

    public function show_post_category($id)
    {



        return Post_category::find($id);
    }

    public function update_post_category($request, $id)
    {

        try {

            $query = Post_category::find($id);
            $query->fill($request->input());
            $query->save();





            return redirect()->back()->with("success", "Chỉnh sửa thông tin  thành công");
        } catch (\Exception $err) {
            return redirect()->back()->with("error", $err->getMessage());
        }
    }
}
