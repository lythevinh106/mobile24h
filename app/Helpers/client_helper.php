<?php

namespace App\Helpers;




class  client_helper
{

    // public static function recursive_menu($categories, $parent_id = 0, $chars = "")
    // {

    //     $html = '';

    //     foreach ($categories as $key => $category) {
    //         if ($category->parent_id == $parent_id) {


    //             $html .= '




    //        ';


    //             unset($categories[$key]);


    //             $html .= self::recursive_menu($categories, $category->id, $chars . "|--");
    //         }
    //     }

    //     return $html;
    // }


    public  static function format_price($price)
    {

        return number_format($price, 0, ",", ".") . " ₫";
    }


    public static function convert_str($str)
    {
        // $str = preg_replace(“ / (à | á | ạ | ả | ã | â | ầ | ấ | ậ | ẩ | ẫ | ă | ằ | ắ | ặ | ẳ | ẵ) / ”, ‘a’, $str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);

        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
        //$str = str_replace(” “, “-”, str_replace(“&*#39;”,”",$str));

    }



    public  static function status_active($value)
    {
        if ($value == 0) {
            return '<div class="order__main-item__status__main text-info"> Đang  Chuẩn Bị Hàng</div>';
        } else if ($value == 1) {
            return '<div class="order__main-item__status__main text-primary">Đang Vận Chuyển </div>';
        } elseif ($value == 2) {
            return '<div class="order__main-item__status__main">Giao Thành Công </div>';
        } elseif ($value == -1) {
            return '<div class="order__main-item__status__main text-secondary">Đơn Hàng Đã Bị Hủy </div>';
        }
    }


    public  static function status_active_admin($value)
    {
        if ($value == 0) {
            return '<div class="text-info"> Đang  Chuẩn Bị Hàng</div>';
        } else if ($value == 1) {
            return '<div class="text-primary">Đang Vận Chuyển </div>';
        } elseif ($value == 2) {
            return '<div class="text-success">Giao Thành Công </div>';
        } elseif ($value == -1) {
            return '<div class=" text-secondary">Đơn Hàng Đã Bị Hủy </div>';
        }
    }



    public  static function status_number_product($value)
    {
        if ($value == 0) {
            return '<span class="text-danger"> Hết Hàng</span>';
        } else if ($value  <= 30) {
            return '<span class="text-warning"> Sắp Hết Hàng</span>';
        } elseif ($value > 30) {
            return '<span class="text-success">Còn Hàng </span>';
        }
    }
}
