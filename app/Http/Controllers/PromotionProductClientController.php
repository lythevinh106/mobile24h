<?php

namespace App\Http\Controllers;

use App\Trait\ProductClientService;
use Illuminate\Http\Request;

class PromotionProductClientController extends Controller
{

    use ProductClientService;
    public function index()
    {
        $promotion_products = $this->get_promotion_product();
        // dd($promotion_products);

        return view("client.promotion.promotion", [

            "title" => "Khuyến Mãi",

            "promotion_products" => $promotion_products
        ]);
    }
}
