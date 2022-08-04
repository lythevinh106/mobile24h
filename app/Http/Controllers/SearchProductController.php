<?php

namespace App\Http\Controllers;


use App\Trait\ProductClientService;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{


    const LIMIT = 10;

    use ProductClientService;
    public function index(Request $request)
    {


        // dd($request->input("search"));

        $products = $this->products_for_search($request);
        // dd($products);


        return view("client.search.search", [

            "title" => "tim kiếm ",

            "products" => $products



        ]);
    }


    public function load_search_product(Request $request)
    {



        // dd($request->input("category_id"));
        $page = $request->input('page', 0);
        $key_search = $request->input('key_search');
        // dd($key_search);


        $products = $this->products_for_search($request, $key_search, $page, self::LIMIT);



        if (count($products) != 0) {
            $html = view("client.search.component.list", ["products" => $products])->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
    }



    public function auto_complete(Request $request)
    {
        $products = $this->load_auto_complete($request);


        if (count($products) != 0) {
            $html = view("client.layouts.component.list_search", ["products" => $products])->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
        // dd($request->input("string_search"));
    }
}
