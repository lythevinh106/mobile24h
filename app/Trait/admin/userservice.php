<?php

namespace App\Trait\admin;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\Paginator;


trait UserService
{

    public function list_users($request)
    {


        if ($request->input("sort")) {
            $list_user =  Admin::orderby("id", $request->input("sort"));
        } else {
            $list_user =  Admin::orderby("id", "desc");
        }



        if ($request->input("search")) {

            $list_user->where("name", "LIKE", '%' . $request->input('search') . '%');
        }
        return  $list_user->paginate(4)->withQueryString();
    }


    public function create_user($request)
    {
        DB::beginTransaction();

        try {




            $admin =   Admin::create([
                "name" => $request->input("name"),
                "email" => $request->input("email"),
                "password" => Hash::make($request->input("password")),
                "active" => $request->input("active"),


            ]);

            Admin::find($admin->id)->roles()->attach($request->input("role_id"));

            DB::commit();
            return redirect()->back()->with("success", "Chúc mừng bạn tạo tài khoản thành công");
        } catch (\Exception $err) {
            DB::rollBack();
            return redirect()->back()->with("error", $err->getMessage());

            return false;
        }
    }

    public function show_user($user)
    {
        $user = Admin::find($user);


        return $user;
    }

    public function update_user($request, $user)
    {
        DB::beginTransaction();
        try {

            // $query = Admin::find($user);
            // $query->fill($request->input());
            // $query->save();
            $query = Admin::find($user);
            $query->name = ($request->input("name"));
            $query->email = ($request->input("email"));
            $query->active = (int)($request->input("active"));
            // $query->password = Hash::make(($request->input("password")));
            $query->save();



            Admin::find($user)->roles()->sync($request->input("role_id"));

            DB::commit();


            return redirect()->back()->with("success", "Chỉnh sửa thông tin  thành công");
        } catch (\Exception $err) {
            return redirect()->back()->with("error", $err->getMessage());
        }
    }


    public function delete_user($id)
    {

        try {

            return Admin::find($id)->delete();
        } catch (\Exception $err) {
            return false;
        }
    }


    public function checkPermissionAccess($key_code, $user)
    {

        $roles = $user->roles;


        foreach ($roles as $role) {
            $permissions =  $role->permissions;
            if ($permissions->contains("key_code", $key_code)) {
                return true;
            }
        }
        return false;
    }
}
