@extends('client.layouts.main')

@section('content')
    <div class="content-sale container-fluid">

        <!-- ///list-scrolfa-li-->
        <div class="list-scroll list-scroll--sale">


            @php
                $dem = 0;
            @endphp

            @foreach ($promotion_products as $key => $promotion_product)
                <a href="#sale--{{ $dem }}" class="list-scroll-box "><span>{{ $key }}</span></a>
                @php
                    $dem++;
                @endphp
            @endforeach

        </div>





        <div class="content-sale-top">
            <div class="content-sale-top__detail ">

                <a href="#sale--mobile" class="content-sale-top__detail__img">
                    <img src="{{ asset('client/images/uudai1.png') }}" alt="">
                </a>
                <a href="#sale--mobile" class="content-sale-top__detail__img">
                    <img src="{{ asset('client/images/uudai2.png') }}" alt="">
                </a>
                <a href="#sale--mobile" class="content-sale-top__detail__img">
                    <img src="{{ asset('client/images/uudai3.png') }}" alt="">
                </a>
                <a href="#sale--mobile" class="content-sale-top__detail__img">
                    <img src="{{ asset('client/images/uudai4.png') }}" alt="">
                </a>
                <a href="#sale--mobile" class="content-sale-top__detail__img">
                    <img src="{{ asset('client/images/udai5.png') }}" alt="">
                </a>


            </div>
        </div>

        <div class="content-sale-hot-banner container">
            <a><img data-src="{{ asset('client/images/hotsale-samsung-galaxy-s22-04.jpg') }}" alt=""></a>

        </div>

        <!-- sale-mobile -->
        {{-- @php
            dd($promotion_products);
        @endphp --}}
        @php
            $dem = 0;
        @endphp
        @foreach ($promotion_products as $key => $promotion_product)
            <div class="content-sale-main container" id="sale--{{ App\Helpers\client_helper::convert_str($dem) }}">
                <div class="content-sale-main__header">
                    <img data-src="{{ asset('client/images/sale-mobile-edit.png') }}" alt="">
                    <h3>Khuyến Mãi {{ $key }}</h3>
                </div>

                @php
                    $dem++;
                @endphp

                <div class="content-sale-main__product">

                    @foreach ($promotion_product as $product)
                        <div class="content-sale-main__product-item ">
                            <div class="sale-main__product-item__img ">
                                <a href="{{ route('load_detail_product', $product->id) }}"><img
                                        src="{{ $product->feature_image }}" alt=""></a>
                            </div>
                            <div class="sale-main__product-item__sale sale--vnpay">
                                <img src="{{ asset('client/images/icon7-50x50 (1).png') }}" alt="">
                                <span>XẢ KHO - GIÁ SỐC</span>
                            </div>
                            <div class="sale-main__product-item__name ">

                                <a href="{{ route('load_detail_product', $product->id) }}"> {{ $product->name }}</a>
                            </div>
                            <div class="sale-main__product-item__old-price ">
                                {{ App\Helpers\client_helper::format_price($product->price) }}
                            </div>
                            <div class="sale-main__product-item__new-price ">
                                {{ App\Helpers\client_helper::format_price($product->latest_price) }}
                            </div>

                            <div class="sale-main__product-item__cart cart--main">
                                {{-- <span><a href="{{ route('cart.add', $product->id) }}">Thêm <i
                                            class="fa-solid fa-cart-shopping"></i></a></span> --}}

                                @if ($product->number_product_quantity > 0)
                                    <span> <a class="text-white" onclick="add_cart_ajax({{ $product->id }},this)">Thêm
                                            <i class="fa-solid fa-cart-shopping"></i></a></span>




                                    <span><a href="{{ route('load_detail_product', $product->id) }}">Mua<i
                                                class="fa-solid fa-dollar-sign"></i></a></span>
                                @else
                                    <div class="text-danger h6"> Đã Hết Hàng</div>
                                @endif

                            </div>

                        </div>
                    @endforeach




                </div>
                {{-- <div class="content-sale-main__overview overview--btn">
                    <span>
                        Xem thêm sản phảm
                    </span>
                </div> --}}



            </div>
        @endforeach



        <!-- ///sale-laptop -->




















    </div>
@endsection


@section('js')
    <script src="{{ asset('client/public/js/sale.js') }} "></script>
@endsection
