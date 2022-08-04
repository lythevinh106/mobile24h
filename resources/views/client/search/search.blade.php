@extends('client.layouts.main')


@section('content')
    <!-- //star-content -->
    <div class="content-product container-fluid">

        <div class="content-product-top container">

            <div class="content-product-top__slider">
                <a class="content-product-top__slider-img"><img class="lazy"
                        data-src="{{ asset('client/images/slider-product1.png') }} " alt=""></a>

            </div>

            <div class="content-product-top__banner--1">
                <img class="lazy" data-src="{{ asset('client/images/banner-top-product1.png') }}" alt="">
            </div>

            <div class="content-product-top__banner--2">
                <img class="lazy" data-src="{{ asset('client/images/banner-top-product2.png') }}" alt="">
            </div>
        </div>


        <div class="content-product-main container">
            <div class="content-product-main-header">

                <div class="content-product-main-header__title">
                    Tìm Kiếm Được
                </div>


                <div class="content-product-main-header__filter">
                    <i class="fa-solid fa-filter"></i> <span> Filter</span>
                </div>


            </div>

        </div>

        <div class="content-product-main__filter container">

            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <li class="content-product-main__filter__title">Sắp xếp </li>
                        <li><a href="{{ request()->url() }}">Mặc Định</a></li>
                        <li><a href="{{ request()->fullUrlWithQuery(['order_by' => 'price', 'sort' => 'asc']) }}">Giá: từ
                                thấp đến cao</a></li>
                        <li><a href="{{ request()->fullUrlWithQuery(['order_by' => 'price', 'sort' => 'desc']) }}">Giá: từ
                                cao đến thấp</a></li>
                    </ul>
                </div class="col-md-3">

                <div class="col-md-3">
                    <ul>
                        <li class="content-product-main__filter__title">Giá </li>
                        <li><a href="{{ request()->url() }}">All</a></li>
                        <li> <a href="{{ request()->fullUrlWithQuery(['start' => 0, 'to' => 5000000]) }}">dưới
                                {{ \App\Helpers\client_helper::format_price(5000000) }} </a>
                        </li>
                        <li> <a href="{{ request()->fullUrlWithQuery(['start' => 3000000, 'to' => 10000000]) }}">từ
                                {{ \App\Helpers\client_helper::format_price(3000000) }} đến
                                {{ \App\Helpers\client_helper::format_price(10000000) }}</a>
                        </li>
                        <li> <a href="{{ request()->fullUrlWithQuery(['start' => 0, 'to' => 50000000]) }}">dưới
                                {{ \App\Helpers\client_helper::format_price(50000000) }} </a>
                        </li>

                        <li> <a href="{{ request()->fullUrlWithQuery(['start' => 100000000, 'to' => 10000000000]) }}">trên
                                {{ \App\Helpers\client_helper::format_price(100000000) }} </a>
                        </li>


                    </ul>
                </div>
            </div>



        </div>

        <div id="list_products" class="content-product-main__show container">


            @include('client.search.component.list')















        </div>

        @if (count($products) > 0)
            <p onclick="loadmore_search('{{ request()->input('search') }}')" style="margin-top: 20px"
                class="content-product-main__show__overview overview--btn mt-10">
                <span>
                    <input type="hidden" value="1" id="page">
                    Xem thêm sản phảm
                </span>
            </p>
        @else
            <h4 class="text-center bg-secondary bg-gradient text-white container">HIỆN TẠI KHÔNG CÓ SẢN PHẨM NÀO</h4>
        @endif




    </div>
@endsection


@section('js')
    <script>
        function loadmore_search(key_search) {

            const page = Number($("#page").val());


            console.log(key_search);


            // console.log(typeof category_id);
            $.ajax({
                type: "get",
                url: "/load_search_product",
                data: {
                    page,
                    key_search

                },
                dataType: "json",
                success: function(result) {

                    if (result.html !== '') {
                        $('#list_products').append(result.html);
                        $('#page').val(page + 1);
                    } else {
                        alert('Đã load xong Sản Phẩm');
                        $('.overview--btn').css('display', 'none');
                    }
                }
            });


        }
    </script>
@endsection
