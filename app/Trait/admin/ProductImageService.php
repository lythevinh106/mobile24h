<?php

namespace App\Trait\admin;

use App\Models\Product;
use App\Models\Product_image;

trait ProductImageService
{
    public function delete_product_image_by_product_id($product_id)
    {

        try {
            return Product_image::where("product_id", $product_id)->delete();
        } catch (\Exception $err) {
            return redirect()->back()->with("error", $err->getMessage());
            return false;
        }
    }
}
