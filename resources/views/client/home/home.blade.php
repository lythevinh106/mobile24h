@extends('client.layouts.main')

@section('content')
    <div class="content-home container-fluid">

        {{-- @php
            dd(Cart::content());
        @endphp --}}


        <!-- list-scroll -->


        <div class="list-scroll list-scroll--home">

            <a href="#promotion" class="list-scroll-box list-scroll-box__promotion"><span>Khuyến mãi</span></a>

            <a href="#features_product" class="list-scroll-box list-scroll-box__features_product"><span>Sản phẩm nổi
                    bật</span></a>

            <a href="#suggestion_product" class="list-scroll-box list-scroll-box__suggestion_product"><span>Sản phẩm gợi
                    ý</span></a>


            <a href="#post" class="list-scroll-box list-scroll-box__post"><span>Bài Viết</span></a>

        </div>
        <!-- //end scroll -->



        <div class="content-home-top ">
            <div class="content-home-top__banner ">

                <a href="{{ route('promotion-client') }}"> <img src="{{ $header_banner->feature_image }}"
                        alt=""></a>


            </div>
            <div class="content-home-top__slider container">

                <div class="row">

                    <div class="content-top-slider-home" id="promotion">

                        @foreach ($header_sliders as $slider)
                            <div class="content-top-slider-home-img"><img src="{{ $slider->feature_image }}" alt="">
                            </div>
                        @endforeach


                    </div>



                </div>
            </div>
        </div>





        <div class="content-home-features container">

            <div class="row">
                <h1 class="content-home-features__title" id="features_product">
                    SẢN PHẨM BÁN CHẠY NHẤT
                </h1>
            </div>
            <div class="row">

                <div class="content-home-features__slider col-md-12">


                    @foreach ($feature_products as $feature_product)
                        <div class="content-home-features__slider-item">
                            <div class="item__img">
                                <a href="{{ route('load_detail_product', $feature_product->id) }}"> <img
                                        src="{{ $feature_product->feature_image }}" alt=""></a>
                            </div>
                            <div class="item__name">

                                <a>
                                    {{ $feature_product->feature_name }}</a>
                            </div>

                            <div class="item__sale sale--week">

                                <img data-src="{{ asset('client/images/icon1-50x50.png') }}" alt="">
                                <span>TUẦN LỄ VÀNG</span>

                            </div>
                            <p class="item__old_price">

                                {{ \App\Helpers\client_helper::format_price($feature_product->price) }}
                            </p>
                            <p class="item__new_price">
                                {{ \App\Helpers\client_helper::format_price($feature_product->latest_price) }}
                            </p>


                            <div class="item__cart cart--main">

                                @if ($feature_product->number_product_quantity > 0)
                                    <span><a class="text-white"
                                            onclick="add_cart_ajax({{ $feature_product->id }},this)">Thêm
                                            <i class="fa-solid fa-cart-shopping"></i></a></span>

                                    {{-- <span class=""><a class="text-white"
                                    onclick="add_cart_ajax({{ $feature_product->id }},this)">Thêm
                                    <i class="fa-solid fa-cart-shopping"></i></a></span> --}}

                                    <span><a href="{{ route('load_detail_product', $feature_product->id) }}">Mua<i
                                                class="fa-solid fa-dollar-sign"></i></a></span>
                                @else
                                    <div class="text-danger h6"> Đã Hết Hàng</div>
                                @endif

                            </div>



                        </div>
                    @endforeach





                </div>
            </div>






        </div>

        <!-- trademark -->
        <div class="content-home-trademark container">
            <div class="row">
                <div class="col-md-4">
                    <div class="content-home-trademark__img">
                        <img src="{{ asset('client/images/bannerct1.png') }} " alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-home-trademark__img">
                        <img src="{{ asset('client/images/bannerct2.png') }} " alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-home-trademark__img">
                        <img src="{{ asset('client/images/bannerct3.png') }} " alt="">
                    </div>
                </div>
            </div>

        </div>


        <!-- sugesstion -->
        <div class="content-home-suggestion container">

            <h2 class="content-home-suggestion__title" id="suggestion_product">GỢI Ý HÔM NAY</h2>

            <div class="content-home-suggestion__main ">

                <ul class="tab row">
                    @php
                        $dem = 0;
                    @endphp
                    @foreach ($product_promotions as $key => $product_promotion)
                        <div class="col-md-3">
                            <li class="active"><img data-src="{{ asset('client/images/icongoiy3.png') }}" alt="">
                                <a href="#promotion-{{ $dem }}">{{ $product_promotion->name }}</a>
                            </li>
                        </div>
                        @php
                            $dem++;
                        @endphp
                    @endforeach




                </ul>


                <!-- //foryou -->
                <div class="tab-content">
                    @php
                        $dem = 0;
                    @endphp
                    @foreach ($product_promotions as $key => $product_promotion)
                        <div class="tab-content__box row" id="promotion-{{ $dem }}">

                            @php
                                $dem++;
                            @endphp
                            @foreach ($product_promotion->products as $item)
                                @if ($item->active == 1)
                                    <div class="tab-content__box-item ">
                                        <div class="tab-content__box-item__img">
                                            <a href="{{ route('load_detail_product', $item->id) }}"> <img
                                                    data-src="{{ $item->feature_image }}" alt=""></a>
                                        </div>
                                        <div class="tab-content__box-item__sale sale--vnpay">
                                            <img src="{{ asset('client/images/icon6-50x50.png') }}" alt="">
                                            <span>VNPAY GIẢM 500K</span>
                                        </div>

                                        <div class="tab-content__box-item__title">
                                            <a href="{{ route('load_detail_product', $item->id) }}">
                                                {{ $item->name }}</a>
                                        </div>
                                        <div class="tab-content__box-item__old-price">
                                            {{ \App\Helpers\client_helper::format_price($item->price) }}
                                        </div>
                                        <div class="tab-content__box-item__new-price">
                                            {{ \App\Helpers\client_helper::format_price($item->latest_price) }}
                                        </div>



                                        <div class="tab-content__box-item__cart cart--main">
                                            {{-- <span><a href="{{ route('cart.add', $item->id) }}">Thêm <i
                                           
                                            class="fa-solid fa-cart-shopping"></i></a></span> --}}
                                            @if ($item->number_product_quantity > 0)
                                                <span class=""><a class="text-white"
                                                        onclick="add_cart_ajax({{ $item->id }},this)">Thêm
                                                        <i class="fa-solid fa-cart-shopping"></i></a></span>

                                                {{-- <span><a href="">Mua<i class="fa-solid fa-dollar-sign"></i></a></span> --}}


                                                <span><a href="{{ route('load_detail_product', $item->id) }}">Mua<i
                                                            class="fa-solid fa-dollar-sign"></i></a></span>
                                            @else
                                                <div class="text-danger h6"> Đã Hết Hàng</div>
                                            @endif

                                        </div>

                                    </div>
                                @endif
                            @endforeach



                        </div>
                    @endforeach

                    <!-- //tab-sale -->





                </div>

            </div>




        </div>



        <!-- content-home-post -->
        <div class=" content-home-post container">
            <div class="row">
                <div class="content-home-post-main col-md-9">
                    <div class="content-home-post-main__title">
                        <h2 id="post"> 24H CÔNG NGHỆ</h2>
                        <h4><a>Xem tất cả</a></h4>
                    </div>

                    <div class="content-home-post-main__list row">
                        <div class="col-md-4">
                            <div class="content-home-post-main__list__img">
                                <img src="{{ asset('client/images/post1.jpg') }} " alt="">
                            </div>
                            <div class="content-home-post-main__list__description">
                                <a> Không thể tin được, chỉ 90K mà đã sở hữu được 1 chiếc tai nghe chính hãng xịn sò?</a>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="content-home-post-main__list__img">
                                <img src="{{ asset('client/images/post2.jpg') }}" alt="">
                            </div>
                            <div class="content-home-post-main__list__description">
                                <a> Không thể tin được, chỉ 90K mà đã sở hữu được 1 chiếc tai nghe chính hãng xịn sò?</a>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="content-home-post-main__list__img">
                                <img src="{{ asset('client/images/post2.png') }}" alt="">
                            </div>
                            <div class="content-home-post-main__list__description">
                                <a> Không thể tin được, chỉ 90K mà đã sở hữu được 1 chiếc tai nghe chính hãng xịn sò?</a>
                            </div>

                        </div>


                    </div>
                </div>


                <div class="col-md-3">
                    <div class="content-home-post__banner">
                        <img src="{{ asset('client/images/mvg.png') }} " alt="">
                    </div>
                </div>
            </div>

        </div>




    </div>
@endsection





@section('js')
    <script src="{{ asset('client/public/js/home.js') }}"></script>
@endsection
