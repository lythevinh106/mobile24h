<?php

namespace App\Trait;

use App\Models\Category;
use App\Models\Customer;
use App\Models\District;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Province;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Mail\SendMailOrder;
use App\Models\Cart_item;
use App\Models\Session_users;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Jobs\QueueSendMailOrder;





use Exception;
use PDO;

trait OrderService
{
    public function order_product($request)
    {
        // dd(Cart::content());
        // dd($request->input());



        try {

            // dd($request->input());

            // insert table customer
            if (!Auth::check()) {
                $address = Province::find((int)$request->input("province"))->name
                    . "-" . District::find((int)$request->input("district"))->name . "-" . $request->input("address");
            }


            if (!Auth::check()) {
                $customer = Customer::create([
                    "name" => $request->input("name"),
                    "phone_number" => $request->input("phone"),
                    "address" =>   $address,
                    "email" => $request->input("email"),
                    "other" => $request->input("other"),



                ]);
            }








            ////insert table orders
            if (Auth::check()) {
                $order = Order::create([

                    "user_id" =>  Auth::id(),
                    "status" => 0,
                    "payment" => $request->input("payment_method"),
                    'order_token' => time() . Auth::id() . 'mb24',
                    "order_date" => Carbon::now()


                ]);
            } else {
                $order = Order::create([

                    "customer_id" =>  $customer->id,
                    "status" => 0,
                    "payment" => $request->input("payment_method"),
                    'order_token' => time() . Auth::id() . 'mb24',
                    "order_date" => Carbon::now()


                ]);
            }



            ///insert order_item
            $arr_check = collect([]);
            foreach ($request->input("check_children") as $check) {

                $arr_check[] = $check;
            }








            foreach ($request->input("qty") as $product_id => $qty) {

                if ($arr_check->contains($product_id)) {
                    Order::find($order->id)->products()->attach($product_id, ['quantity' => $qty]);


                    ///// update lai so luong san pham  va them so luong da ban database
                    $old_product_quantity = Product::find($product_id)->number_product_quantity;
                    $old_product_sold = Product::find($product_id)->product_sold;
                    Product::find($product_id)->update([
                        "number_product_quantity" => $old_product_quantity - $qty,
                        "product_sold" => $old_product_sold + $qty
                    ]);
                }
            }

            $data = [
                "time_order" => Carbon::now()->format("d m Y \\và\\o \l\ú\c H \G\i\ờ i \P\h\ú\\t s \G\i\â\y"),
                "name" => Auth::check() ? Auth::user()->name : $request->input("name"),
                "email" => Auth::check() ? Auth::user()->email : $request->input("email"),
                "address" =>  Auth::check() ? Auth::user()->address : $address,
                "order_items" => Order::find($order->id)->order_items,
                "total" => $request->input("cart_total"),
                "payment_method" => $request->input("payment_method"),
                "phone" =>  Auth::check() ? Auth::user()->phone : $request->input("phone"),
                "order_token" =>    $order->order_token

            ];

            ////delete cart 

            if (Auth::check()) {

                $cart_items = Session_users::where("user_id", Auth::id())->first()->cart_items;
                // dd($cart_items);
                foreach ($cart_items as $item) {
                    if ($arr_check->contains($item->product_id)) {

                        Cart_item::find($item->id)->delete();
                        // Cart_item::where("product_id", $item->id)->where("")->first()->$item->delete();
                    }
                }
            } else {
                foreach (Cart::content() as $item) {
                    if ($arr_check->contains($item->id)) {
                        Cart::remove($item->rowId);
                    }
                }
            }
















            //  Mail::to("thangkhovipro@gmail.com")->send(new DemoMail); 
            // Mail::to(Auth::check() ? Auth::user()->email : $request->input("email"))->send(new SendMailOrder($data)); // gui du lieu qua

            QueueSendMailOrder::dispatch(Auth::check() ? Auth::user()->email : $request->input("email"), $data);



            DB::commit();
        } catch (\Exception $err) {

            DB::rollBack();
            throw new Exception($err->getMessage());
            // return redirect()->back()->with("error", $err->getMessage());
            return false;
        }
    }




    public function momo_payment($request)
    {

        //dd($request->input());
        $qty = $request->input("qty");
        foreach ($qty  as $key => $value) {
            if (!in_array($key, $request->input("check_children"))) {
                unset($qty[$key]);
            }
        }
        // dd($qty);



        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        // dd(implode('-', $request->input("check_children")));


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = $request->input("cart_total");

        $orderId = time() . "";

        $redirectUrl = url("/order/momo_payment_handel");
        $ipnUrl =  url("/order/momo_payment_handel");
        $extraData = implode('-', $request->input("check_children")) . "+" . implode('-', $qty);





        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        // dd($signature);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,

            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));

        $jsonResult = json_decode($result, true);  // decode json
        // dd($result);
        // dd($jsonResult);


        return redirect()->to($jsonResult['payUrl']);
    }



    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}
