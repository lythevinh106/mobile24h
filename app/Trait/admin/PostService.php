<?php

namespace App\Trait\admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;




trait PostService
{


    public function list_posts($request)
    {




        if ($request->input("sort")) {
            $list_posts =  Post::orderby("id", $request->input("sort"));
        } else {
            $list_posts =  Post::orderby("id", "desc");
        }



        if ($request->input("search")) {

            $list_posts->where("name", "LIKE", '%' . $request->input('search') . '%');
        }
        return  $list_posts->paginate(4)->withQueryString();
    }

    public  function create_post($request)
    {



        try {


            Post::create([


                "name" => $request->input("name"),
                "title" => $request->input("title"),
                "feature_image" => $request->input("feature_image"),
                "content" => $request->input("content"),
                "post_category_id" => $request->input("post_category_id"),
                "active" => $request->input("active"),
                "admin_id" => Auth::guard("admin")->user()->id



            ]);

            return redirect()->back()->with("success", "Thêm Bài Viết Thành Công ");
        } catch (\Exception $err) {

            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }

    public function delete_post($id)
    {

        try {

            return Post::find($id)->delete();
        } catch (\Exception $err) {
            return false;
        }
    }


    public function show_post($id)
    {
        $post = Post::find($id);


        return $post;
    }


    public function update_post($request, $post)
    {
        try {

            $query = Post::find($post);
            $query->fill($request->input());
            $query->save();





            return redirect()->back()->with("success", "Chỉnh sửa thông tin   thành công");
        } catch (\Exception $err) {
            return redirect()->back()->with("error", $err->getMessage());
        }
    }
}
