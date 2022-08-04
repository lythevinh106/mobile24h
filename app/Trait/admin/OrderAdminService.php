<?php

namespace App\Trait\admin;

use App\Models\Order;

trait OrderAdminService
{
    public function list_order($request)
    {



        $order = Order::query();

        if ($request->input("fill_status")) {
            $order->where("status", $request->input("fill_status"));
        } else {

            $order->where("status", 0);
        }

        if ($request->input("fill_other")) {
            $order->orderby($request->input("fill_other"), $request->input("orderby"));
        } else {

            $order->orderby("order_date", "desc");
        }


        $order->orderby('order_date', 'desc');
        if ($request->input("search")) {
            $order->where('order_token', 'LIKE', '%' . $request->input("search") . "%");
        }



        return $order->paginate(8)->withQueryString();
    }


    public function delete_order($id)
    {

        try {

            return Order::find($id)->delete();
        } catch (\Exception $err) {
            return false;
        }
    }


    // public function order_detail()
    // {

    //     return Order::where("status", 0)->orderby('order_date', 'desc')->paginate(8)->withQueryString();
    // }
}
