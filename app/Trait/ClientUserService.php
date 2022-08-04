<?php

namespace App\Trait;

use App\Mail\TakePasswordEmail;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Province;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Mail\VerifiedEmail;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

// use Illuminate\Pagination\Paginator;


trait ClientUserService
{

    // public function list_users($request)
    // {


    //     if ($request->input("sort")) {
    //         $list_user =  Admin::orderby("id", $request->input("sort"));
    //     } else {
    //         $list_user =  Admin::orderby("id", "desc");
    //     }



    //     if ($request->input("search")) {

    //         $list_user->where("name", "LIKE", '%' . $request->input('search') . '%');
    //     }
    //     return  $list_user->paginate(4)->withQueryString();
    // }


    public function create_user($request)
    {
        // dd(Str::random(10) . Carbon::now()->format("Y-m-d-H:i-s"));
        // dd($request->input());


        $address = Province::find((int)$request->input("province"))->name
            . "-" . District::find((int)$request->input("district"))->name . "-" . $request->input("address");
        $email_token = Str::random(10) . Carbon::now()->format("Y-m-d-H:i-s");

        try {
            $user =  User::create([
                "name" => $request->input("name"),
                "password" => Hash::make($request->input("password")),
                "email" => $request->input("email"),

                "address" =>   $address,

                "phone" => $request->input("phone"),
                "email_token" =>  $email_token,
                "remember_token" => Str::random(7) . Carbon::now()



            ]);




            $data = [

                "link_verified" =>  url("client/register_verified?id=$user->id&token=$email_token")
            ];
            Mail::to($request->input("email"))->send(new VerifiedEmail($data));

            DB::commit();
            return view("client.auth.alert", ["title" => "Check Email Của Bạn Để Xác Nhận Tài Khoản"]);
        } catch (\Exception $err) {
            DB::rollBack();
            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }
    public function take_password_forget($request)
    {
        $count = User::where("email", $request->input("email"))->where("email_verified", 1)->count();


        try {


            if ($count >= 1) {

                $user = User::where("email", $request->input("email"))->where("email_verified", 1)->get();
                $user_id = $user["0"]->id;
                $user_remember_token = $user["0"]->remember_token;
                // dd($user_remember_token);
                $data = [

                    "link_forget" =>  url("client/store_forget_password?id=$user_id&remember_token=$user_remember_token")
                ];

                Mail::to($request->input("email"))->send(new TakePasswordEmail($data));
                DB::commit();
                return redirect()->back()->with("success", "Tin nhắn lấy lại mật khẩu đã được gửi vào email của ban, vui lòng vào email để kiểm tra");
            } else {

                return redirect()->back()->with("error", "Email Của Bạn Chưa Được Đăng Kí Hoặc Xác Nhận TRên Hệ thống vui lòng kiểm Tra lại");
            }
        } catch (\Exception $err) {
            DB::rollBack();
            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }
}
