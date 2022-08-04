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
use Illuminate\Support\Carbon;
use App\Models\Promotion;

trait PromotionService
{







    public function sync_promotion()
    {


        $time_now =  Carbon::now()->toDateTimeString();
        ////UPDATE LẠI CHO BẰNG PRICE_SALE
        $products = Product::where("id", ">", 0)->get();
        foreach ($products as $product) {

            $product->update([
                "latest_price" => $product->price_sale
            ]);
        }

        ////UPDATE NÊUW CÓ KHUYEN MAI

        $arr_promotions = Promotion::where([


            ["active", 1],
            ["start_date", "<", $time_now],
            ["end_date", ">", $time_now],

        ])->with("products")->get();



        foreach ($arr_promotions as $arr_promotion) {






            if ($arr_promotion->type == 0) {
                foreach ($arr_promotion->products as $product) {

                    $product->update([


                        "latest_price" => $product->price_sale - ($product->price_sale * ($arr_promotion->value / 100))
                    ]);
                }
            } else if ($arr_promotion->type == 1) {
                foreach ($arr_promotion->products as $product) {

                    $product->update([


                        "latest_price" => $product->price_sale - $arr_promotion->value
                    ]);
                }
            }
        }
    }
}
