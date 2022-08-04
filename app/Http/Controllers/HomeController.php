<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Slider;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Models\Product_promotion;
use Illuminate\Support\Carbon;
use App\Models\District;
use Illuminate\Support\Facades\Auth;
use App\Models\Session_users;
use App\Models\Cart_item;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{



    public function index()
    {
        // dd(District::find(2)->province);


        $time_now =  Carbon::now()->toDateTimeString();



        // dd($auth_cart_total);


        // dd($auth_products["0"]->product->id);
        $header_sliders = Slider::where("active", 1)->get();
        $header_banner = Banner::where("active", 1)->first();
        $feature_products = Product::where("active", 1)->limit(10)->orderBy("product_sold", "desc")->get(); ///san pham ban chay

        $arr_promotion = Promotion::where([


            ["active", 1],
            ["start_date", "<", $time_now],
            ["end_date", ">", $time_now],

        ])->with("products")->get();



        return view(
            "client.home.home",
            [
                "title" => "Trang Chủ",
                "header_sliders" => $header_sliders,
                "header_banner" => $header_banner,

                "feature_products" => $feature_products,
                "product_promotions" => $arr_promotion
            ]





        );
    }
}
