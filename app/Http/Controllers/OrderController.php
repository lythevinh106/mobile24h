<?php

namespace App\Http\Controllers;

use App\Http\Requests\client\OrderRequest;
use App\Models\Product;
use App\Trait\OrderService;
use Illuminate\Http\Request;
use App\Mail\SendMailOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart_item;
use App\Models\Session_users;
use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Support\Carbon;
use App\Jobs\QueueSendMailOrder;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{

    use OrderService;

    public function store_check(Request $request)
    {

        $order_token = $request->input("order_token");


        $order = Order::where("order_token", $order_token)->first();

        // dd($order->order_items);
        if ($order) {
            $html = view("client.order.component.check_order_result", ["order_items" => $order->order_items])->render();
            return response()->json(['html' => $html, "error" => false]);
        } else {

            return response()->json(["error" => true]);
        }
    }

    public function show_check()
    {


        return view("client.order.check_order", ["title" => "Kiểm Tra Mã Vận Đơn "]);
    }


    public function momo_payment_handel(Request $request)
    {
        //dd($request->input());

        $split_array = explode('+', $request->input("extraData"));

        $check_children = explode('-', $split_array["0"]);

        $qty_children = explode('-', $split_array["1"]);

        // dd($qty_children);
        // dd($check_children);

        $qty_all = array_combine($check_children, $qty_children);




        ////insert_database
        $order = Order::create([

            "user_id" =>  Auth::id(),
            "status" => 0,
            "payment" => 1,
            'order_token' => time() . Auth::id() . 'mb24',
            "order_date" => Carbon::now()


        ]);


        ///insert order_item

        $arr_check = collect([]);
        foreach ($check_children as $check) {

            $arr_check[] = $check;
        }




        foreach ($qty_all as $product_id => $qty) {

            if ($arr_check->contains($product_id)) {
                Order::find($order->id)->products()->attach($product_id, ['quantity' => $qty]);
            }

            ///// update lai so luong san pham database
            $old_product_quantity = Product::find($product_id)->number_product_quantity;
            $old_product_sold = Product::find($product_id)->product_sold;
            Product::find($product_id)->update([
                "number_product_quantity" => $old_product_quantity - $qty,
                "product_sold" => $old_product_sold + $qty
            ]);
        }

        $data = [
            "time_order" => Carbon::now()->format("d m Y \\và\\o \l\ú\c H \G\i\ờ i \P\h\ú\\t s \G\i\â\y"),
            "name" =>  Auth::user()->name,
            "email" =>  Auth::user()->email,
            "address" =>   Auth::user()->address,
            "order_items" => Order::find($order->id)->order_items,
            "total" => $request->input("amount"),
            "payment_method" => 1,
            "phone" =>   Auth::user()->phone,
            "order_token" => Order::find($order->id)->order_token

        ];

        ////delete cart 

        if (Auth::check()) {

            $cart_items = Session_users::where("user_id", Auth::id())->first()->cart_items;
            // dd($cart_items);
            foreach ($cart_items as $item) {
                if ($arr_check->contains($item->product_id)) {

                    Cart_item::find($item->id)->delete();
                }
            }
        }



        QueueSendMailOrder::dispatch(Auth::user()->email, $data);



        ///Mail::to(Auth::user()->email)->send(new SendMailOrder($data)); // gui du lieu qua





        return redirect()->route("order.success")->with("success", "Đơn hàng của bạn đã được thanh toán xong");
    }










    public function store(OrderRequest $request)
    {
        // $cart_items =  Cart_item::find(41)->where("product_id", $item->id)->where("")->first()->$item->de;

        // dd($cart_items);
        // dd(Auth::user()->name);

        // dd($request->input());
        if ($request->input("payment_method") == 0) {
            $this->order_product($request);
            return redirect()->route("order.success")->with("success", "Chúc Mừng Bạn Đặt Hàng Thành Công");
        } else {
            return $this->momo_payment($request);
        }
    }

    public function success()
    {

        return view("client.order.success", [
            "title" => "Thanh Toán Thành Công",

        ]);
    }
}
