<?php

namespace App\Libraries\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;
use App\Models\Entities\CategoryEntity;
use Illuminate\Support\Facades\Auth;
use App\Models\Session_users;
use App\Models\Cart_item;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CartAuthComposer
{
    /**
     * Bind data to the view.
     * Bind data vào view. $view->with('ten_key_se_dung_trong_view', $data);
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {




        if (Auth::check()) {

            //   dd(Auth::guard('admin')->user()->id);





            $session_user = Session_users::where("user_id", Auth::id())->first();


            if (!is_null($session_user)) {


                $auth_products = Cart_item::where("session_user_id",  $session_user->id)->get();


                $cart_total = 0;

                $cart_items = Cart_item::where("session_user_id", $session_user->id)->get();

                foreach ($cart_items as $cart_item) {
                    $cart_total += ($cart_item->quantity * $cart_item->product->latest_price);
                }
                // bind to view
                $view->with([


                    "auth_cart_count" => $session_user->cart_items->sum("quantity"),
                    "auth_products" => $auth_products,
                    "auth_cart_total" =>  $cart_total,
                ]);
            }
        }
    }
}
