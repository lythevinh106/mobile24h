<?php

namespace App\Trait\admin;

use App\Events\AlertChangeCategory;
use App\Events\TriggerChangeCategory;
use App\Models\Category;



trait CategoryService
{


    public function get_parent()
    {

        $parent = Category::where("parent_id", 0)->get();

        return $parent;
    }
    public function show_category($user)
    {
        $user = Category::find($user);


        return $user;
    }
    public function create_category($request)
    {


        try {

            Category::create([

                "name" => $request->input("name"),
                "parent_id" => $request->input("parent_id"),
                "active" => $request->input("active"),


            ]);

            return redirect()->back()->with("success", "Thêm Danh Mục Thành Công");
        } catch (\Exception $err) {

            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }


    public function list_categories()
    {

        $list_categories = Category::all();


        return  $list_categories;
    }


    public function list_categories_active()
    {

        $list_categories = Category::where("active", 1)->get();



        return  $list_categories;
    }




    public function delete_category($id)
    {

        try {

            return Category::where("id", $id)->orWhere('parent_id', $id)->delete();
        } catch (\Exception $err) {
            return false;
        }
    }



    public function update_category($request, $category)
    {
        try {

            $query = Category::find($category);
            $query->fill($request->input());
            $query->save();


            // event(new AlertChangeCategory('hello world'));
            event(new AlertChangeCategory('đã có cập nhật loại sản phẩm mới bạn có thể tải lại trang để xem '));
            // broadcast(new AlertChangeCategory("hello world"));


            event(new TriggerChangeCategory);



            return redirect()->back()->with("success", "Chỉnh sửa thông tin  thành công");
        } catch (\Exception $err) {
            return redirect()->back()->with("error", $err->getMessage());
        }
    }
}
