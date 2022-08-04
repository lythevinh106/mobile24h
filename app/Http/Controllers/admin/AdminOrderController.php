<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Trait\admin\OrderAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;


class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use OrderAdminService;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'order');

            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $time_now = Carbon::now();

        $order_cancel_in_month = Order::where("status", -1)->whereMonth('updated_at',  $time_now->month)->count();
        $order_finish_in_month = Order::where("status", 2)->whereMonth('updated_at',  $time_now->month)->count();
        $order_transport_in_month = Order::where("status", 1)->whereMonth('updated_at',  $time_now->month)->count();
        $order_wait_for_confirmation_in_month = Order::where("status", 0)->whereMonth('updated_at',  $time_now->month)->count();





        $orders = $this->list_order($request);
        return view("admin.order.home", [
            "title" => " Đơn Hàng Mới", "orders" => $orders, "order_cancel_in_month" => $order_cancel_in_month,
            "order_finish_in_month" => $order_finish_in_month,
            "order_transport_in_month" => $order_transport_in_month,
            "order_wait_for_confirmation_in_month" => $order_wait_for_confirmation_in_month


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $order_detail = Order::find($id);
        $order_products = $order_detail->order_items;
        $total = 0;



        foreach ($order_products as  $order_product) {
            $total += ($order_product->quantity * $order_product->product->latest_price);
        }
        // dd($total);

        return view("admin.order.detail_order", [
            "title" => "Chi tiết Đơn Hàng", "order_total" => $total, "order" => $order_detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        //  dd($request->input());


        $query = Order::find($id);



        $query->status = $request->input("status");
        $query->payment = $request->input("payment");
        $query->save();





        return redirect()->route("admin.order.list")->with("success", "Cập Nhật Đơn Hàng Thành Công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $result =  $this->delete_order($request->input("id"));
        if ($result != false) {
            return response()->json([

                "error" => false,
                "message" => "Xóa thành công"




            ]);
        } else {
            return response()->json([

                "error" => true,




            ]);
        }
    }
}
