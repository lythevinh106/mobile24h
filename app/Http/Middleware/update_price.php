<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Carbon;
use App\Models\Promotion;

class update_price
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $time_now =  Carbon::now()->toDateTimeString();


        // ////UPDATE LẠI CHO BẰNG PRICE_SALE
        // $products = Product::where("id", ">", 0)->get();
        // foreach ($products as $product) {

        //     $product->update([
        //         "latest_price" => $product->price_sale
        //     ]);
        // }

        // ////UPDATE NÊUW CÓ KHUYEN MAI

        // $arr_promotions = Promotion::where([


        //     ["active", 1],
        //     ["start_date", "<", $time_now],
        //     ["end_date", ">", $time_now],

        // ])->with("products")->get();



        // foreach ($arr_promotions as $arr_promotion) {


        //     // foreach ($arr_promotion->products as $product) {

        //     //     $product->update([


        //     //         "latest_price" => $product->price_sale
        //     //     ]);
        //     // }



        //     if ($arr_promotion->type == 0) {
        //         foreach ($arr_promotion->products as $product) {

        //             $product->update([


        //                 "latest_price" => $product->price_sale - ($product->price_sale * ($arr_promotion->value / 100))
        //             ]);
        //         }
        //     } else if ($arr_promotion->type == 1) {
        //         foreach ($arr_promotion->products as $product) {

        //             $product->update([


        //                 "latest_price" => $product->price_sale - $arr_promotion->value
        //             ]);
        //         }
        //     }
        // }
        // dd($arr);
        return $next($request);
    }
}
