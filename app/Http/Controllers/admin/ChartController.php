<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'chart');

            return $next($request);
        });
    }
    public function index()
    {




        ////chart for order every month
        $order = Order_items::join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereYear("orders.created_at", Carbon::now()->year)->where("orders.status", 2)
            ->groupBy(DB::raw("Month(orders.created_at)"))->select(DB::raw("SUM(quantity*products.latest_price) as sum"))->pluck("sum");

        // dd($order);

        $months = Order_items::join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->whereYear("orders.created_at", Carbon::now()->year)->where("orders.status", 2)
            ->groupBy(DB::raw("Month(orders.created_at)"))->select(DB::raw("Month(orders.created_at) as month"))->pluck("month");

        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,];

        foreach ($months as $index => $month) {

            $data[$month - 1] = (int)$order[$index];
        }


        ////chart for status order



        $status_oder_cancel = Order::where("status", -1)->count();
        $status_oder_wait = Order::where("status", 0)->count();
        $status_oder_transport = Order::where("status", 1)->count();
        $status_oder_finish = Order::where("status", 2)->count();


        $data_status[0] = (int) $status_oder_cancel;
        $data_status[1] = (int)$status_oder_wait;
        $data_status[2] = (int)$status_oder_transport;
        $data_status[3] = (int)$status_oder_finish;















        // dd($data2);

        // dd($month);
        return view("admin.chart.chart", [
            "title" => "Thống Kê Doanh Thu",
            "data" => $data,
            "data_status" => $data_status


        ]);
    }
}
