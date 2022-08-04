<?php

namespace App\Http\Controllers\admin;

use App\Trait\admin\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_image;
use App\Trait\admin\ProductService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Tag;
use App\Models\Promotion;

class ProductController extends Controller
{
    use SoftDeletes;
    use CategoryService;
    use ProductService;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'product');

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        //$id = $request->input("fill_category");




        $list_product = $this->list_products($request);
        ////get parent_category
        $parents = $this->get_parent();








        return view("admin.product.list", [


            "title" => "Danh Sách Sản Phẩm",
            "products" => $list_product,
            "parents" => $parents,


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $categories = $this->list_categories_active();
        $tags = Tag::all();
        $promotions = Promotion::where("active", 1)->get();
        // dd($categories);
        return view("admin.product.add", [

            "title" => "Thêm Sản Phẩm",
            "categories" => $categories,
            "tags" => $tags,
            "promotions" => $promotions

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->input());
        return $this->create_product($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->show_product($id);
        $product_images = Product::find($id)->product_images;
        $categories = $this->list_categories();
        $tags = Tag::all();
        $product_tag_id = Product::find($id)->tags()->get();
        $product_promotion_id = Product::find($id)->promotions()->get();
        $promotions = Promotion::where("active", 1)->get();




        return view("admin.product.edit", [

            "product" => $product,
            "product_images" => $product_images,
            "categories" => $categories,
            "title" => "Sửa sản phẩm",
            "tags" => $tags,
            "product_tag_id" => $product_tag_id,
            "product_promotion_id" =>  $product_promotion_id,
            "promotions" => $promotions


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
    public function update(ProductRequest $request, $id)
    {


        // dd($request->input());
        return  $this->update_product($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $result =  $this->delete_product($request->input("id"));
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
