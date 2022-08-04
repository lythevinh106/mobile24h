<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Trait\admin\UserService;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use SoftDeletes;
    use UserService;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'admin');

            return $next($request);
        });
    }
    public function index(Request $request)
    {



        $list_users = $this->list_users($request);


        return view("admin.user.list", [

            "list_users" => $list_users,
            "title" => "Danh sách User",

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $roles = Role::all();
        return view("admin.user.add", [


            "title" => "Thêm User",
            "roles" => $roles

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        return  $this->create_user($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {

        $user = $this->show_user($id);
        $roles = Role::all();



        return view(
            "admin.user.edit",
            [
                "title" => "Sửa User",
                "user" => $user,
                "roles" => $roles



            ]

        );
        return view("admin.user.edit");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->input());
        $request->validate(
            [
                "name" => "min:5|max:100|required|unique:admins,name," . $id,
                "email" => "min:10|unique:admins,email," . $id,
                // "password" => "min:6|max:100|required"

            ],
            [

                "required" => " :attribute không được để trống",

                "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập email khác",
                "min" => ":attribute có tối thiểu :min kí tự",
                "max" => ":attribute có tối đa :max kí tự"


            ],
            [
                "name" => "tên tài khoản",
                "email" => "tên email",
                "password" => "mật khẩu",
            ]






        );
        return $this->update_user($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $result =  $this->delete_user($request->input("id"));
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
