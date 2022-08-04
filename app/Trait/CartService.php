<?php

namespace App\Trait;

use App\Models\Cart_item;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Session_users;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;


trait CartService
{



    public function add_cart($id, $qty = 1, $request)
    {


        if ($request->has("num_order")) {

            $qty = $request->input("num_order");
        }

        $product = Product::find($id);



        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $qty,
                'price' => $product->latest_price,
                "options" => ['old_price' => $product->price, "feature_image" => $product->feature_image,  'title' => $product->title,],
            ]
        );

        return redirect()->route("cart.show")->with("success", "thêm vào giỏ hàng thành công");
    }



    public function destroy_cart()
    {

        if (Auth::check()) {
            $session_user = Session_users::where("user_id", Auth::id())->first();
            $cart_items = $session_user->cart_items;
            foreach ($cart_items as $cart_item) {
                $cart_item->delete();
            }

            //  dd($cart_items);

            $session_user->update([
                "total" => 0
            ]);
        } else {



            Cart::destroy();
        }


        return redirect()->route("cart.show")->with("success", "đã xóa toàn bộ giỏ hàng thành công");
    }

    public function remove_cart($rowId)
    {
        if (Auth::check()) {
            $session_user = Session_users::where("user_id", Auth::id())->first();
            $session_user->cart_items->where("product_id", $rowId)->first()->delete();

            $this->auth_update_cart_total($session_user);
        } else {
            Cart::remove($rowId);
        }


        return redirect()->route("cart.show")->with("success", "đã xóa sản phẩm thành công");
    }

    public function update_cart($request)
    {

        $qty = $request->input("qty");


        foreach ($qty as $k => $v) {

            Cart::update($k, $v);
        }
        return redirect()->route("cart.show")->with("success", "cập nhật giỏ hàng thành công");
    }

    public function update_cart_ajax($request)
    {
        // dd($request->input("rowId"));

        // dd(Cart_item::find(14));



        if ($request->input("value")) {
            $value = (int)$request->input("value");

            $rowId = $request->input("rowId");



            if (Auth::check()) {
                $session_user = Session_users::where("user_id", Auth::id())->first();;


                $cart_item = Cart_item::where("session_user_id", $session_user->id)->where("product_id", $rowId)->first();


                // dd($value);


                Cart_item::find($cart_item->id)->update([
                    "quantity" => $value
                ]);

                return  $this->auth_update_cart_total($session_user);
            } else {

                return Cart::update($rowId, $value);
            }
        } else {

            return false;
        }


        // dd($request->input());
    }




    public function add_cart_ajax($request, $qty = 1)
    {
        // dd($request->input("rowId"));


        if ($request->input("id")) {
            if ($request->has("num_order")) {

                $qty = $request->input("num_order");
            }

            $product = Product::find($request->id);



            if (Auth::check()) {
                Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => $qty,
                        'price' => $product->latest_price,
                        "options" => ['old_price' => $product->price, "feature_image" => $product->feature_image,  'title' => $product->title,],
                    ]
                );


                $session_user = Session_users::where("user_id", Auth::user()->id)->first();

                //dd($session_user["0"]->id);
                // Cart::destroy();
                $cart_item = Cart_item::where("session_user_id",  $session_user->id)->where("product_id", $product->id,)->first();


                if ($cart_item == true) {
                    $cart_item->update([


                        "quantity" =>  $cart_item->quantity + $qty
                    ]);
                } else {
                    Cart_item::create([

                        "session_user_id" =>   $session_user->id,
                        "product_id" =>   $product->id,
                        "quantity" => $qty
                    ]);
                }


                return $this->auth_update_cart_total($session_user);
            } else {
                return  Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => $qty,
                        'price' => $product->latest_price,
                        "options" => ['old_price' => $product->price, "feature_image" => $product->feature_image,  'title' => $product->title,],
                    ]
                );
            }
        } else {

            return false;
        }

        // dd($request->input());
    }





    public function auth_update_cart_total($session_user)
    {

        $cart_total = 0;

        $cart_items = Cart_item::where("session_user_id", $session_user->id)->get();

        foreach ($cart_items as $cart_item) {
            $cart_total += ($cart_item->quantity * $cart_item->product->latest_price);
        }




        return $session_user->update(
            [

                "total" => ($cart_total > 0) ? $cart_total : 0

            ]

        );
    }
}
