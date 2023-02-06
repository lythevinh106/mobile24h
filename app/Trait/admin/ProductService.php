<?php

namespace App\Trait\admin;

use App\Models\Category;
use App\Models\Product;
use App\Trait\admin\ProductImageService;
use App\Models\Product_image;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product_tag;
use App\Models\Product_promotion;

trait ProductService
{
    use ProductImageService;
    use PromotionService;

    public function list_products($request)
    {
        $list_products =  Product::select("*");

        if ($request->input("order_by")) {
            $list_products->orderby($request->input("order_by"), $request->input("sort"));
        } else {

            $list_products->orderby("id", "desc");
        }



        if ($request->input("fill_category")) {

            $list_products->whereHas('category', function (Builder $query) use ($request) {

                $query->where('parent_id', $request->input("fill_category"));
            });
        }

        if ($request->input("search")) {

            $list_products->where("name", "LIKE", '%' . $request->input('search') . '%');
        }
        return  $list_products->paginate(10)->withQueryString();
    }



    public  function create_product($request)
    {



        try {
            $request->except('_token');
            $request->except('small_image');




            $product = Product::create($request->all());
            Product::find($product->id)->update(["latest_price" => $request->input("price_sale")]);


            if ($product) {
                foreach ($request->input("small_image") as $value) {
                    Product_image::create(
                        [
                            "product_id" => $product->id,
                            "name" => $value
                        ]
                    );
                }
            }

            if ($request->input("tag_id")) {
                $query = Product::find($product->id);
                foreach ($request->input("tag_id") as $tag_id) {

                    $query->tags()->attach($tag_id);
                }
            }
            if ($request->input("promotion_id") != null) {
                $query = Product::find($product->id);


                $query->promotions()->attach($request->input("promotion_id"));
            }

            $this->sync_promotion();

            return redirect()->back()->with("success", "Thêm Sản Phẩm Thành Công ");
        } catch (\Exception $err) {

            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }


    public function delete_product($id)
    {

        try {
            $this->delete_product_image_by_product_id($id);
            return Product::find($id)->delete();
        } catch (\Exception $err) {
            return false;
        }
    }



    public function show_product($id)
    {
        $product = Product::find($id);


        return $product;
    }


    public function update_product($request, $product)
    {
        try {

            $query = Product::find($product);
            $query->fill($request->input());
            $query->save();

            /////insert product_image
            Product_image::where("product_id", $product)->forceDelete();
            foreach ($request->input("small_image") as $value) {

                Product_image::create([

                    "name" => $value,
                    "product_id" => $product
                ]);
            }


            //////sync in product_tag
            Product::find($product)->tags()->sync($request->input("tag_id"));

            if ($request->input("promotion_id") != null) {
                Product::find($product)->promotions()->sync([$request->input("promotion_id")]);
            } else {

                Product_promotion::where("product_id", $product)->delete();
            }





            $this->sync_promotion();

            return redirect()->back()->with("success", "Chỉnh sửa thông tin  thành công");
        } catch (\Exception $err) {
            return redirect()->back()->with("error", $err->getMessage());
        }
    }
}
