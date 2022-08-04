<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'role');

            return $next($request);
        });
    }



    public function index()
    {

        $roles = Role::all();


        return view("admin.role.list", ["title" => "Danh Sách Các Quyền", "roles" => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $permission_parents = Permission::where("parent_id", 0)->get();
        // dd($permission_parent);

        return view("admin.role.add", ["title" => "Thêm Quyền Mới", "permission_parents" =>   $permission_parents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
            [

                "name" => "min:3|max:300|required|unique:roles,name",
                "description" => "min:3|max:300|required|",
            ],
            [

                "required" => ":attribute không được bỏ trống",
                "min" => ":attribute tối thiểu có :min kí tự",
                "max" => ":attribute tối đa có :max kí tự",
                "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",


            ],

            [
                "name" => "tên danh mục",
                "description" => "mô tả quyền",




            ]
        );


        DB::beginTransaction();
        try {
            $role = Role::create([

                "name" => $request->input("name"),
                "description" => $request->input("description"),
            ]);
            Role::find($role->id)->permissions()->attach($request->input('permission_id'));
            DB::commit();
            return redirect()->back()->with("success", "Thêm Quyền Mới Thành Công");
        } catch (Exception $err) {
            DB::rollBack();
            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $role = Role::find($id);
        // dd($role->permissions->find(39));
        $permission_parents = Permission::where("parent_id", 0)->get();


        return view("admin.role.edit", ["title" => "Danh Sách Các Quyền", "role" => $role, "permission_parents" => $permission_parents]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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

        $request->validate(
            [

                "name" => "min:3|max:300|required|unique:roles,name," . $id,
                "description" => "min:3|max:300|required|",
            ],
            [

                "required" => ":attribute không được bỏ trống",
                "min" => ":attribute tối thiểu có :min kí tự",
                "max" => ":attribute tối đa có :max kí tự",
                "unique" => ":attribute đã tồn tại trong hệ thống vui lòng chọn :attribute khác",


            ],

            [
                "name" => "tên danh mục",
                "description" => "mô tả quyền",




            ]
        );


        DB::beginTransaction();
        try {
            Role::find($id)->update([

                "name" => $request->input("name"),
                "description" => $request->input("description"),
            ]);
            Role::find($id)->permissions()->sync($request->input('permission_id'));
            DB::commit();
            return redirect()->back()->with("success", "Cập Nhật Quyền Mới Thành Công");
        } catch (Exception $err) {
            DB::rollBack();
            dd($err);
            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {


        $result = true;

        try {

            Role::where("id", $request->input("id"))->delete();
        } catch (\Exception $err) {
            $result = false;
        }



        if ($result != false) {
            return response()->json([

                "error" => false,
                "message" => "Xóa thành công",





            ]);
        } else {
            return response()->json([

                "error" => true,




            ]);
        }
    }
}
