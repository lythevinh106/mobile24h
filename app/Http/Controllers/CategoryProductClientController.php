<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trait\ProductClientService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CategoryProductClientController extends Controller
{

    use ProductClientService;

    public const LIMIT = 10;


    public function index(Request $request, $id, $slug = '')
    {


        $products = $this->products_for_menu($request, $id);
        // dd($products);
        $title = Category::find($id)->name;
        $category_id = Category::find($id)->id;
        $name_category = $this->get_name_category($id);


        ////tags

        $tags_for_category = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->join("product_tags", "product_tags.product_id", "=", "products.id")->groupBy("tags.name")->groupBy("tags.id")->select('tags.id', 'tags.name')
            ->join("tags", "tags.id", "=", "product_tags.tag_id")

            ->where(Category::find($id)->parent_id == 0 ? "categories.parent_id" : "categories.id", $id)
            ->get();


        // dd($tags_for_category);







        return view("client.product.product", [

            "title" =>  $title,
            "name_category" => $name_category,
            "products" => $products,
            'category_id' => $category_id,

            "tags_for_category" => $tags_for_category


        ]);



        // dd($products);
    }


    public function load_product(Request $request)
    {



        $page = $request->input('page', 0);
        $category_id = (int)$request->input("category_id");


        $products = $this->products_for_menu($request, $category_id, $page, self::LIMIT);

        if (count($products) != 0) {
            $html = view("client.product.component.list", ["products" => $products])->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
    }


    public function load_detail_product($id)
    {

        $detail_product = $this->detail_product($id);
        $product_images = $this->detail_product($id)->product_images;
        $related_products = $this->related_products($id);


        // dd($related_products);


        return view("client.product.detail_product", [

            "title" => "Chi Tiết Sản Phẩm",
            "detail_product" =>   $detail_product,
            "product_images" => $product_images,

            "related_products" => $related_products
        ]);
    }
}
