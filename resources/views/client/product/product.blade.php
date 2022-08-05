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

        <div class="content-product-tag container">



            <div class="row">
                <span class="content-product-tag-title">
                    Tags:
                    @foreach ($tags_for_category as $tag)
                        <a class=" {{ request()->input('tag') == $tag->id ? 'hover' : '' }}"
                            href="{{ request()->fullUrlWithQuery(['tag' => $tag->id]) }}">{{ $tag->name }}</a>
                    @endforeach


                </span>
            </div>
        </div>

        <div class="content-product-main container">
            <div class="content-product-main-header">

                <div class="content-product-main-header__title">
                    {{ $name_category }}
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


            @include('client.product.component.list')















        </div>

        @if (count($products) > 0)
            <p onclick="loadmore({{ $category_id }},'/load_product',{{ request()->input('tag') }})"
                style="margin-top: 20px" class="content-product-main__show__overview overview--btn mt-10">
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
        function loadmore(category_id, link, tag_ajax = null) {

            const page = Number($("#page").val());


            // console.log(typeof category_id);
            $.ajax({
                type: "get",
                url: link,
                data: {
                    page,
                    category_id,
                    tag_ajax
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
