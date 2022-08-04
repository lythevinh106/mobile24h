<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $menus = Category::where("active", 1)->get();
        return view("client.main", ["menus" => $menus]);
    }
}
