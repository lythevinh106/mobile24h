<?php

namespace App\Helpers;




class  admin_helper
{

    public static function recursive_menu($categories, $parent_id = 0, $chars = "", $route = "category")
    {

        $html = '';

        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parent_id) {


                $html .= '
         
               <tr id="row-' . $category->id . '">
                <th scope="row"> ' . $category->id . ' </th>
                <td   class="fw-bold" > ' . $chars . $category->name . '</td>

       
                <td>
                  
                    ' . self::user_active($category->active) . '


                </td>
                <td>
                    <button type="button" class="btn btn-info"><a class="text-light"
                            href="/admin/' . $route . '/edit/' . $category->id . ' ">Sửa</a></button>


                   
                        <button type="button"   class="btn btn-danger">
                            <a href="#"
                                onclick="removeRow(' . $category->id . ' , \'/admin/' . $route . '/delete/\' )">Xóa</a></button>
                   



                </td>

            </tr>';


                unset($categories[$key]);


                $html .= self::recursive_menu($categories, $category->id, $chars . "|--", $route);
            }
        }

        return $html;
    }



    public  static function user_active($value)
    {
        if ($value == 1) {
            return '<button class="btn btn-success">kích hoat</button>';
        } else if ($value == 0) {
            return '<button class="btn btn-secondary">Vô Hiệu Hóa</button>';
        }
    }


    public static function recursive_select($categories, $parent_id = 0, $chars = "", $param_id = null)
    {

        $html = '';

        foreach ($categories as $key => $category) {
            $var = "";
            if ($category->parent_id == $parent_id) {

                if ($param_id == null) {

                    if ($category->parent_id == 0) {
                        $html .= '
                
                        <option  class="text-info" disabled value=" ' . $category->id . '">' . $chars . $category->name . '</option>
                        
                        ';
                    } else {
                        $html .= '
                
                        <option   value=" ' . $category->id . '">' . $chars . $category->name . '</option>
                        
                        ';
                    }
                } else {

                    if ($category->id == $param_id) {
                        $var = "selected";
                    }

                    $html .= '
                    
                    
                    <option  ' . $var . ' value=" ' . $category->id . '">' . $chars . $category->name . '</option>
                    
                    ';
                    $var = "";
                }



                unset($categories[$key]);

                $html .= self::recursive_select($categories, $category->id, $chars . "---", $param_id);
            }
        }
        return $html;
    }
}
