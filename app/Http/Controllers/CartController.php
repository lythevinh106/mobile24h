<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\District;
use App\Models\Province;
use App\Trait\CartService;
use App\Models\Session_users;
use App\Models\Cart_item;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    use CartService;


    public function index()
    {


        $provinces = Province::all();
        $districts = Province::find(1)->districts;


        return view("client.cart.cart", [


            "title" => "Giỏ Hàng Của Bạn",
            "provinces" =>  $provinces,
            "districts" => $districts

        ]);
    }
    public function add($id, $qty = 1, Request $request)
    {

        return $this->add_cart($id, $qty, $request);
    }

    // public function add_cart($id, $qty = 1, Request $request)
    // {
    // }



    public function destroy()
    {

        return $this->destroy_cart();
    }

    public function remove($rowId)
    {


        return $this->remove_cart($rowId);
    }

    public function update(Request $request)
    {


        return $this->update_cart($request);
    }

    public function update_ajax(Request $request)
    {



        // dd((int)(Cart::total()));



        $bol = $this->update_cart_ajax($request);


        if (Auth::check()) {
            $session_user = Session_users::where("user_id", Auth::user()->id)->first();

            $auth_cart_total = 0;



            $cart_items = Cart_item::where("session_user_id", $session_user->id)->get();
            $auth_cart_count = $cart_items->sum("quantity");

            foreach ($cart_items as $cart_item) {
                $auth_cart_total += ($cart_item->quantity * $cart_item->product->latest_price);
            }

            $latest_price = $cart_items->where("product_id", $request->input("rowId"))->first()->product->latest_price;
            $cart_item_subtotal_id = $cart_items->where("product_id", $request->input("rowId"))->first()->product->id;
            $cart_item_subtotal = $latest_price * $request->input("value");
        } else {
            $cart_item_subtotal =   Cart::content()[$request->input('rowId')]->price * $request->input("value");
            $cart_item_subtotal_id =  Cart::content()[$request->input('rowId')]->id;
        }

        // dd($cart_item_subtotal_id);


        if ($bol != false) {
            return response()->json([

                "error" => false,
                "cart_total" => Auth::check() ? $auth_cart_total : (int)Cart::total(),
                "cart_count" => Auth::check() ? $auth_cart_count : (int)Cart::count(),
                "cart_item_subtotal" =>  $cart_item_subtotal,

                "cart_item_id" => (int)$cart_item_subtotal_id



            ]);
        } else {
            return response()->json([

                "error" => true,
            ]);
        }
    }

    public function add_ajax(Request $request)
    {

        $id = (int)$request->input("id");
        $cart = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        // dd($cart);


        $bol = $this->add_cart_ajax($request);

        $product = Product::find($id);




        if ($bol != false) {
            $html = view("client.layouts.component.modal_add")->render();

            $html_li = view("client.layouts.component.cart_li", ["product" => $product])->render();

            if (Auth::check()) {
                $cart_total_auth = Session_users::where("user_id", Auth::id())->first();
                $cart_count_auth = Cart_item::where("session_user_id",  $cart_total_auth->id)->sum("quantity");
            }




            return response()->json([

                "error" => false,
                "message" => "Thêm Sản Phẩm Vào Giỏ Hàng Thành Công",

                "html" => $html,
                "html_li" => $html_li,


                "cart_total" => Auth::check() ? $cart_total_auth->total : (int)Cart::total(),
                "cart_count" =>  Auth::check() ?  $cart_count_auth : (int)Cart::count(),

            ]);
        } else {

            return response()->json([

                "error" => true,
            ]);
        }
    }


    public function load_select(Request $request)
    {
        $value = (int)$request->input("value");
        $list_districts = Province::find($value)->districts;
        if ($list_districts->count() > 0) {
            $html = view("client.cart.component.district", ["districts" => $list_districts])->render();
            return response()->json([

                "error" => false,
                "html" => $html
            ]);
        } else {
            return response()->json([

                "error" => true,

            ]);
        }
    }
}
