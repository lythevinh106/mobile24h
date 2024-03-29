<?php

namespace App\Http\Controllers;

use App\Events\TriggerChangeCategory;
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
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{



    public function index()
    {
        // dd(District::find(2)->province);


        // dd("home");

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


    public function test_redis()
    {
        // Redis::set('user:1', 'Taylor');
        // Redis::set('user:2', 'Hoin');
        // Redis::set('user:3', 'vinh');
        // Redis::setex('user:4', 30, 'Taylor hethan');

        // $values = Redis::get('user');
        // event(new TriggerChangeCategory("ly the vinh"));
        $arr = ["ly", "the", "vinh"];
        Redis::set('mang1', json_encode($arr, TRUE));

        $value = json_decode(Redis::get("mang1"), TRUE);
        dd($value);


        // nên sử dung del để xóa cache để câp nhat lai
        //     Redis::del('blog_1');
        // }

    }

    public function test_pusher()
    {
        return view("client.demopusher");
    }
}
