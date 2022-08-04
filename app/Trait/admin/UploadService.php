<?php

namespace App\Trait\admin;

use App\Models\Category;
use Illuminate\Support\Str;



trait UploadService
{


    public function upload($request, $name_input)
    {

        if ($request->has($name_input)) {


            try {


                $name = Str::random(4) . '-';
                $name .= $request->file($name_input)->getClientOriginalName();


                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('file')->storeAs( /// ham store As se tu dong doi ten neu trung file
                    'public/' . $pathFull,  /// se luu vao storage/public/.....
                    $name

                );

                return '/storage/' . $pathFull . '/' . $name; //// tra ve url  sau do se ket hop vs public/url nay hien anh
            } catch (\Exception $error) {
                return false;
            }
        }
    }



    public  function multiupload($request)
    {

        $arr = [];
        foreach ($request as $value) {

            // $name = $value->getClientOriginalName();
            try {


                $name = Str::random(4) . '-';
                $name .= $value->getClientOriginalName();


                $pathFull = 'uploads/' . date("Y/m/d");
                $value->storeAs( /// ham store As se tu dong doi ten neu trung file
                    'public/' . $pathFull,  /// se luu vao storage/public/.....
                    $name

                );

                $arr[] = '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }

        return $arr;
    }
}
