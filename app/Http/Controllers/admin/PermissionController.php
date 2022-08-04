<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Symfony\Component\Console\Input\Input;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.permission.add", ["title" => "Thêm Vào Các Permission"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->input());

        $row_module_parent = Permission::where("name", $request->input("module_parent"))->first();


        // dd($row_module_parent);
        if (!$row_module_parent) {

            $permission = Permission::create([
                'name' => $request->module_parent,
                'description' => $request->module_parent,
                'parent_id' => 0
            ]);

            foreach ($request->module_children as $value) {
                Permission::create([
                    'name' => $value,
                    'description' => $value . '_' . $request->module_parent,
                    'parent_id' => $permission->id,
                    'key_code' => $value . '_' . $request->module_parent
                ]);
            }
        }



        return redirect()->back()->with("success", "thêm module thanh công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
