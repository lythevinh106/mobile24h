<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Trait\admin\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UploadService;

    public function uploadthumb(Request $request)
    {



        $request->validate(
            [

                "file" => "max:10000|mimes:jpg,jpeg,png"
            ],
            [
                "max" => "Dung lượng :attribute phải dưới 100mb",
                "mimes" => ":attribute phải là ảnh là jpg,jpeg,png",

            ]

        );

        // dd($request->file('file'));
        $url = $this->upload($request, "file");

        if ($url != false) {
            return response()->json([

                "error" => false,
                "url" => $url


            ]);
        } else {

            return response()->json([

                "error" => true,



            ]);
        }
    }



    function multiupload_thumb(Request $request)

    {

        //dd($request->file("file2"));



        $request->validate(
            [

                // "file2" => "max:10000|mimes:jpg,jpeg,png,jpe,gif",
                // "file2" => 
                "file2.*" => "max:10000|mimes:jpg,jpeg,png,jpe,gif"
            ],
            [
                "max" => "Dung lượng :attribute phải dưới 100mb vui long chọn lại",
                "mimes" => ":attribute phải là ảnh là jpg,jpeg,png vui lòng chọn lại",

            ],
            [

                "file2" => "file ảnh"
            ],

        );




        $url = $this->multiupload($request->file("file2"));









        if ($url != false) {
            return response()->json([

                "error" => false,
                "url" => $url


            ]);
        } else {

            return response()->json([

                "error" => true,



            ]);
        }
    }

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
        //
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
