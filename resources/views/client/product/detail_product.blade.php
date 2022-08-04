@extends('client.layouts.main')

@section('content')
    <div class="content-product-detail container-fluid">

        {{-- <div class="modal-add">

            <i class="fa-solid fa-check"></i>
            <div class="modal-add__title">
                Đã Thêm Sản Phẩm Vào giỏ hàng thành Công
            </div>
            <i class="fa-solid fa-xmark"></i>

        </div> --}}



        <div class="content-product-detail__main container">



            <div class="content-product-detail__main-info">
                <div class="content-product-detail__main-info__left">
                    <div class="info__left__img slider-for">
                        <div> <img src="{{ $detail_product->feature_image }}" alt=""></div>

                        @foreach ($product_images as $product_image)
                            <div> <img src="{{ $product_image->name }}" alt=""></div>
                        @endforeach


                    </div>
                    <div class="info__left__slider slider-nav">
                        <div class="info__left__slider__img">
                            <img src="{{ $detail_product->feature_image }}" alt="">
                        </div>


                        @foreach ($product_images as $product_image)
                            <div class="info__left__slider__img">
                                <img src="{{ $product_image->name }}" alt="">
                            </div>
                        @endforeach


                    </div>

                </div>

                <div class="content-product-detail__main-info__right">
                    <div class="info__right__name">
                        {{ $detail_product->name }}
                    </div>

                    <div class="info__right__description">
                        {{ $detail_product->title }}
                    </div>

                    <div class="info__right__trademark">
                        @if ($detail_product->company != null || $detail_product->company != '')
                            <span>Thương Hiệu</span> <span>{{ $detail_product->company }}</span>
                        @endif

                    </div>


                    <div class="info__right__tag">

                        <span>Tags:
                            @php
                                $str_convert = \App\Helpers\client_helper::convert_str($detail_product->category->category_parent->name);
                                
                            @endphp
                            @if ($detail_product->tags != null || $detail_product->tag != '')
                                @foreach ($detail_product->tags as $tag)
                                    <a
                                        href="/danh-muc/{{ $detail_product->category->category_parent->id }}-{{ Str::slug($str_convert, '-') }}?tag={{ $tag->id }}">{{ $tag->name }}</a>
                                @endforeach
                            @endif

                        </span>
                        {{-- @if ($detail_product->company != null || $detail_product->company != '')
                            <span>Thương Hiệu</span> <span>{{ $detail_product->company }}</span>
                        @endif --}}

                    </div>

                    <!-- <div class="info__right__color">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="default"><input id="default" name="color" type="radio">Mặc Định</input></label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="red"><input id="red" name="color" type="radio">Đỏ</input></label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="yellow"><input id="yellow" name="color" type="radio">Vàng</input></label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="blue"><input id="blue" name="color" type="radio">Xanh Dương</input></label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label for="pink"><input id="pink" name="color" type="radio">Tím</input></label>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->

                    <div class="info__right__status">
                        <span>Tình trạng:</span>
                        {!! \App\Helpers\client_helper::status_number_product($detail_product->number_product_quantity) !!}
                    </div>
                    <div class="info__right__old-price">
                        <span>{{ \App\Helpers\client_helper::format_price($detail_product->price) }}</span>
                    </div>
                    <div class="info__right__new-price">
                        <span>{{ \App\Helpers\client_helper::format_price($detail_product->latest_price) }}</span>
                    </div>


                    {{-- <div class="info__right__number">
                        <span class="info__right__number_minus">-</span> <input class="info__right__number_input"
                            type="number" name="num_order" value=1 min="1" max="5"> <span
                            class="info__right__number_plus">+</span>
                    </div> --}}

                    <div class="info__right__btn-add">
                        @if ($detail_product->number_product_quantity > 0)
                            <a class="text-white" onclick="add_cart_ajax({{ $detail_product->id }},this)"> Thêm giỏ
                                Hàng
                                <i class="fa-solid fa-cart-shopping"></i></a>
                        @else
                            <a class="text-white"> Sản Phẩm Đã Tạm
                                Hết Hàng
                            </a>
                        @endif


                    </div>



                    <div class="info__right__banner">
                        <a href="">
                            <img src="{{ asset('client/images/banner-detail-product.png') }}" alt="">
                        </a>
                    </div>


                </div>
            </div>

            <div class="content-product-detail__main-description">
                <div class="main-description__title">
                    <p>Mô tả sản phẩm</>
                </div>

                <div class="main-description__description ">
                    {!! $detail_product->content !!}
                </div>

                <div class="main-description__overview">
                    <span>Xem chi tiết</span>
                </div>
            </div>

            <div class="content-product-detail__main-configuration">
                <div class="main-configuration__title">
                    Thông tin chi tiết
                </div>

                <div class="main-configuration__img">
                    <img src="{{ $detail_product->feature_image }}" alt="">
                </div>
                <div class="main-configuration__content">
                    @if ($detail_product->company != null || $detail_product->company != '')
                        <div class="main-configuration__content-item">

                            <span>Hãng Sản Xuất:</span><span>{{ $detail_product->company }}</span>
                        </div>
                    @endif
                    @if ($detail_product->screen != null || $detail_product->screen != '')
                        <div class="main-configuration__content-item">

                            <span>Công nghệ màn hình:</span><span>{{ $detail_product->screen }}</span>
                        </div>
                    @endif

                    @if ($detail_product->rom != null || $detail_product->rom != '')
                        <div class="main-configuration__content-item">

                            <span>Bộ Nhớ Trong:</span><span>{{ $detail_product->rom }}GB</span>
                        </div>
                    @endif


                    @if ($detail_product->ram != null || $detail_product->ram != '')
                        <div class="main-configuration__content-item">

                            <span>Bộ Nhớ Ram:</span><span>{{ $detail_product->ram }}GB</span>
                        </div>
                    @endif
                    @if ($detail_product->orther != null || $detail_product->orther != '')
                        <div class="main-configuration__content-item">

                            <span>Khác:</span><span>{{ $detail_product->orther }}</span>
                        </div>
                    @endif








                </div>


            </div>




        </div>
        <div class="content-product-detail__related container">
            <div class="content-product-detail__related__title">
                Sản Phẩm Liên Quan
            </div>
            <div class="content-product-detail__related__slider">
                @foreach ($related_products as $related_product)
                    <div class="related__slider-item">
                        <div class="related__slider-item__img">
                            <a href="{{ route('load_detail_product', $related_product->id) }}"> <img
                                    src="{{ $related_product->feature_image }}" alt=""></a>
                        </div>

                        <div class="related__slider-item__name">

                            {{ $related_product->name }}

                        </div>

                        <div class="related__slider-item__sale sale--vnpay">
                            <img src="{{ asset('client/images/icon7-50x50 (1).png') }}" alt="">
                            <span>XẢ KHO - GIÁ SỐC</span>
                        </div>

                        <div class="related__slider-item__old-price ">
                            {{ App\Helpers\client_helper::format_price($related_product->price) }}
                        </div>
                        <div class="related__slider-item__new-price ">
                            {{ App\Helpers\client_helper::format_price($related_product->latest_price) }}
                        </div>

                        <div class="related__slider-item__cart cart--main">

                            @if ($related_product->number_product_quantity > 0)
                                <span><a class="text-white" onclick="add_cart_ajax({{ $related_product->id }},this)">Thêm
                                        <i class="fa-solid fa-cart-shopping"></i></a></span>

                                <span><a href="{{ route('load_detail_product', $related_product->id) }}">Mua<i
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
@endsection
