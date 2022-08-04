<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Promotion;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Trait\admin\PromotionService;

class PromotionController extends Controller
{

    use PromotionService;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('module_active', 'promotion');

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();










        return view("admin.promotion.list", [


            "title" => "Danh Sách Khuyến Mãi",
            "promotions" => $promotions,



        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // dd(Carbon::now()->format('Y-m-d \TH: i'));

        // dd($categories);
        return view("admin.promotion.add", [

            "title" => "Thêm Chương Trình Khuyến Mãi",
            "time_now" => Carbon::now()->format('Y-m-d\TH:i')



        ]);
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
        $request->validate([

            "name" => "min:2|max:100|required|unique:promotions,name",

            'title' => 'min:5|max:400|required|unique:promotions,title,',
            'start_date' => 'nullable|date|',
            'end_date' => 'nullable|date|after_or_equal:start_date|'
        ], [

            "required" => " :attribute không được để trống",

            "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập lại",
            "min" => ":attribute có tối thiểu :min kí tự",
            "max" => ":attribute có tối đa :max kí tự",
            "after_or_equal" => " thời gian kết thúc khuyến mãi phải lớn hơn thòi gian bắt đầu khuyến mãi n"
        ], [

            "name" => "tên khuyến mãi",
            "title" => "tên tiêu đề",
            'start_date' => "ngày bắt đầu khuyến mãi",
            'end_date' => "ngày kết thúc khuyến mãi"



        ]);
        // dd(Carbon::parse($request->input("start_date"))->toDateTimeString());

        $request->except('_token');



        // dd($request->input());
        Promotion::create($request->all());

        return redirect()->back()->with("success", "Thêm Chương Trình Khuyến MãiThành Công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $promotion = Promotion::find($id);
        return view("admin.promotion.edit", [

            "promotion" => $promotion,

            "title" => "Sửa Danh Sách Khuyến Mãi",


        ]);
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


        $request->validate([

            "name" => "min:2|max:100|required|unique:promotions,name," . $id,

            'title' => 'min:5|max:400|required|unique:promotions,title,' . $id,
            'start_date' => 'nullable|date|',
            'end_date' => 'nullable|date|after_or_equal:start_date|'
        ], [

            "required" => " :attribute không được để trống",

            "unique" => ":attribute  đã tồn tại trong hệ thống vui lòng nhập  lại",
            "min" => ":attribute có tối thiểu :min kí tự",
            "max" => ":attribute có tối đa :max kí tự",
            "after_or_equal" => " thời gian kết thúc khuyến mãi phải lớn hơn thòi gian bắt đầu khuyến mãi n"
        ], [

            "name" => "tên khuyến mãi",
            "title" => "tên tiêu đề",
            'start_date' => "ngày bắt đầu khuyến mãi",
            'end_date' => "ngày kết thúc khuyến mãi"



        ]);

        $promotion = Promotion::find($id);
        $promotion->fill($request->input());
        $promotion->save();
        $this->sync_promotion();
        return redirect()->back()->with("success", "Cập Nhật Chương Trình Khuyến MãiThành Công");
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

            Promotion::where("id", $request->input("id"))->forceDelete();
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

    public function sync()
    {
        $this->sync_promotion();

        return redirect()->back()->with("success", "Đồng Bộ Hóa Chương Trình Khuyến MãiThành Công");
    }
}
