<?php

namespace App\Trait;

use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;




trait ProductClientService
{
    // public $LIMIT = 10;

    public function products_for_menu($request, $id, $page = null, $limit = 10)
    {
        // dd($this->LIMIT);

        if (Category::find($id)->parent_id != 0) {

            $list_products = Product::where("active", 1)->where("category_id", $id);
        } else {

            $list_products = Product::whereHas('category', function (Builder $query) use ($id) {
                $query->where('parent_id', $id);
            });
        }




        $list_products->when($request->input("tag"), function ($query) use ($request) {

            $query->join("product_tags", "product_tags.product_id", "=", "products.id")
                ->join("tags", "tags.id", "=", "product_tags.tag_id")->where("tags.id", $request->input("tag"));
        });

        $list_products->when($request->input('tag_ajax') != null, function ($query) use ($request) {

            $query->join("product_tags", "product_tags.product_id", "=", "products.id")
                ->join("tags", "tags.id", "=", "product_tags.tag_id")->where("tags.id", $request->input("tag"));
        });






        // dd($list_products);

        $list_products->when($page != null, function ($query) use ($page, $limit) {
            // dd("1");
            $query->offset($page * $limit);
        });

        $list_products->limit($limit);
        $list_products->when($request->has("order_by"), function ($query) use ($request) {
            $query->orderBy($request->input("order_by"), $request->input("sort"));
        });

        $list_products->when($request->has("start"), function ($query) use ($request) {
            $query->whereBetween('latest_price', [$request->input("start"), $request->input("to")]);
        });







        return $list_products->select("products.*")->get();
    }



    public function get_name_category($id)
    {
        $category = Category::find($id);

        if ($category->parent_id != 0) {

            $id_parent =  $category->parent_id;

            $name_category = Category::find($id_parent)->name;
        } else {
            $name_category = $category->name;
        }


        return $name_category;
    }

    public function get_promotion_product()
    {
        ///cach 1
        $arr_result = [];
        $promotions = Promotion::where("active", 1)->with("products")->get();
        foreach ($promotions as $promotion) {
            foreach ($promotion->products as $product) {

                if ($product->category->parent_id == $product->category->category_parent->id) {

                    $arr_result[$product->category->category_parent->name][] = $product;
                }
            }
        }
        return $arr_result;
    }

    public function products_for_search($request, $key_search = null, $page = null, $limit = 10)
    {

        if ($request->input("key_search")) {
            $products =  Product::where("active", 1)->where("name", "LIKE", '%' . $request->input("key_search") . '%')->orWhere("title", "LIKE", '%' . $request->input("key_search") . '%');
        } else {
            $products =  Product::where("active", 1)->where("name", "LIKE", '%' . $request->input("search") . '%')->orWhere("title", "LIKE", '%' . $request->input("search") . '%');
        }





        if ($page != null) {

            $products->offset($page * $limit);
        }

        $products->limit($limit);
        $products->when($page != null, function ($query) use ($page, $limit) {
            $query->offset($page * $limit);
        });




        $products->when($request->has("order_by"), function ($query) use ($request) {
            $query->orderBy($request->input("order_by"), $request->input("sort"));
        });

        $products->when($request->has("start"), function ($query) use ($request) {
            $query->whereBetween('latest_price', [$request->input("start"), $request->input("to")]);
        });


        return $products->get();
    }

    public function load_auto_complete($request)
    {


        // dd($request->input("string_search"));

        $products = Product::where("active", 1)->where("name", "LIKE", '%' . $request->input("string_search") . '%')->orWhere("title", "LIKE", '%' . $request->input("string_search") . '%')->limit(15)->get();
        return $products;
    }


    public function detail_product($id)
    {


        return Product::where("active", 1)->find($id);
    }

    public function related_products($id)
    {
        $list_categories = Product::find($id)->category->category_parent->category_children;
        $list_category_children_id = [];

        foreach ($list_categories as $category) {
            $list_category_children_id[] = $category->id;
        }

        return   $products = Product::whereHas('category', function (Builder $query)  use ($list_category_children_id) {
            $query->whereIn('category_id',  $list_category_children_id)->where("active", 1);
        })->limit(10)->get();
    }
}
