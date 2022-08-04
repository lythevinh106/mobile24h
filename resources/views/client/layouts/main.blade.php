@include('client.head')




<body>

    <div id="wrapper" class="wrapper active">



    </div>
    </div>



    <!-- over-layer -->
    <div class="over-layer">

    </div>



    <!-- banner-left-right -->

    <div class="banner-left">
        <a><img src="{{ asset('client/images/banner-left.png') }}" alt=""></a>

    </div>



    <!-- btn-scroll-top -->
    <div class="btn-scroll-top">
        <img src="{{ asset('client/images/scroll top.png') }}" alt="">

    </div>




    <!-- //header -->

    <div class="header">
        <div class="header-top container">
            <div class="row">
                <div class="header-top__logo">
                    <a href="/"> <img src=" {{ asset('client/images/low-res-logo (3).png') }} "
                            alt=""></a>
                </div>

                <form class="header-top__search" action="{{ route('search-client') }}" autocomplete="off"
                    method="GET">


                    <input id="key_search"
                        value="{{ request()->has('search') == true ? request()->input('search') : '' }}" type="text"
                        placeholder="Nhập Sản Phẩm hoặc Thương Hiệu Cần Tìm Kiếm...." name="search">

                    <div id="search_ajax">

                    </div>
                    <button id="search_btn" class="btn" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>


                </form>


                <div class="header-top__history">
                    <span><a href="{{ route('order.show_check') }}">Kiểm Tra Mã Vận Đơn</a></span>
                </div>
                <div class="header-top__cart ">

                    <!-- layer-fake -->
                    {{-- <div class="header-top__layer-fake"></div> --}}

                    <i class="fa-solid fa-cart-shopping">
                        <div class="header-top__cart-total">
                            <span> {{ Auth::check() ? $auth_cart_count : Cart::count() }}</span>
                        </div>
                    </i>
                    <span><a href="{{ route('cart.show') }}">Giỏ hàng</a></span>

                    <div class="header-top__cart-detail">

                        <ul class="row">




                            @if (Auth::check())

                                @isset($auth_products)
                                    @foreach ($auth_products as $item)
                                        <li id="data-info-{{ $item->product->id }}">

                                            <div class="header-top__cart-detail__img"> <img
                                                    src="{{ $item->product->feature_image }} " alt="">
                                            </div>
                                            <div class="header-top__cart-detail-main">
                                                <div class="header-top__cart-detail-main__name"> {{ $item->product->name }}
                                                </div>
                                                <div class="header-top__cart-detail-main__number"> Số lượng :
                                                    <span class="cart-info-{{ $item->product->id }}"
                                                        id="cart-info-{{ $item->product->id }}">{{ $item->quantity }}</span>
                                                </div>

                                                <div class="header-top__cart-detail-main__price"> Giá :
                                                    <span>
                                                        {{ \App\Helpers\client_helper::format_price($item->product->latest_price) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endisset
                            @else
                                @foreach (Cart::content() as $item)
                                    <li id="data-info-{{ $item->id }}">

                                        <div class="header-top__cart-detail__img"> <img
                                                src="{{ $item->options->feature_image }} " alt="">
                                        </div>
                                        <div class="header-top__cart-detail-main">
                                            <div class="header-top__cart-detail-main__name"> {{ $item->name }}</div>
                                            <div class="header-top__cart-detail-main__number"> Số lượng :
                                                <span class="cart-info-{{ $item->id }}"
                                                    id="cart-info-{{ $item->id }}">{{ $item->qty }}</span>
                                            </div>

                                            <div class="header-top__cart-detail-main__price"> Giá :
                                                <span> {{ \App\Helpers\client_helper::format_price($item->price) }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            @endif














                        </ul>


                        <div class="header-top__cart-detail-end">
                            <span class="header-top__cart-detail-end__number">
                                Tổng tiền <span> {{ Auth::check() ? $auth_cart_count : Cart::count() }}</span> sản phẩm
                            </span>

                            <span class="header-top__cart-detail-end__total">
                                {{ \App\Helpers\client_helper::format_price(Auth::check() ? $auth_cart_total : Cart::total()) }}
                            </span>
                        </div>



                        <div class="header-top__cart-detail-btn">
                            <a href="{{ route('cart.show') }}"> <span>Xem giỏ hàng</span></a>
                        </div>




                    </div>

                </div>

                <ul class="header-top__nav">

                    <li><a><i class="fa-solid fa-newspaper"></i> Tin Tức </a></li>

                    @if (Auth::check())
                        <li class="header-top__nav--info"><a> <i class="fa-solid fa-user-astronaut"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="account--info">
                                <li><i class="fa-solid fa-user-astronaut"></i><a href="{{ route('info.show') }}">Thông
                                        tin tài khoản</a>
                                </li>
                                <li><i class="fa-solid fa-calendar-minus"></i><a
                                        href="{{ route('info.order_show') }}">Quản
                                        lý đơn hàng</a>
                                </li>
                                <li class="log--out"><a href="{{ route('client.logout') }}">Đăng xuất</a></li>
                            </ul>
                        @else
                        <li class="btn--login"><a href="{{ route('client.login') }}"> <i
                                    class="fa-solid fa-user-astronaut"></i> Đăng Nhập </a></li>
                    @endif


                    </li>



                </ul>
            </div>
        </div>

        {{-- ///menu --}}
        @include('client.sidebar')
        {{-- ///end-menu --}}

    </div>


    {{-- alert --}}

    @include('client.alert')


    {{-- //////content --}}
    @yield('content')










    <!-- ///end-content -->







    <div class=" footer container-fluid">

        <div class="container">


            <div class="row">

                <div class="col-md-3">

                    <ul class="footer-list">

                        <li class=""><a href="">Tích điểm Quà tặng VIP</a></li>
                        <li><a href="">Lịch sử mua hàng</a></li>
                        <li><a href="">Cộng tác bán hàng cùng TGDĐ</a></li>
                        <li><a href="">Tìm hiểu về mua trả góp</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                    </ul>
                </div>

                <div class="col-md-3">

                    <ul class="footer-list">

                        <li><a class="" href="">Giới thiệu công ty (MWG.vn)</a></li>
                        <li><a href="">Tuyển dụng</a></li>
                        <li><a href="">Gửi góp ý, khiếu nại</a></li>
                        <li><a href="">Tìm siêu thị (3.160 shop)</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                    </ul>
                </div>

                <div class="col-md-3">

                    <ul class="footer-list">

                        <li><a class="footer-list__title">Tổng đài hỗ trợ (Miễn phí gọi)</a></li>
                        <li><a href="">Gọi mua: 1800.1060 (7:30 - 22:00)</a></li>
                        <li><a href="">Kỹ thuật: 1800.1763 (7:30 - 22:00)</a></li>
                        <li><a href="">Khiếu nại: 1800.1062 (8:00 - 21:30)</a></li>
                        <li><a href="">Bảo hành: 1800.1064 (8:00 - 21:00)</a></li>
                    </ul>
                </div>

                <div class="col-md-3">

                    <div class="footer-group">
                        <h3>Website cùng tập đoàn</h3>
                        <div class="footer-group-main">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer1.png') }}" alt="">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer4.png') }}" alt="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer5.png') }}" alt="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer6.jpg') }}" alt="">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer7.png') }}" alt="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-group-main__img">

                                        <img src="{{ asset('client/images/footer8.png') }}" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="footer-end">

                <p>© 2018. Công ty cổ phần Thế Giới Di Động. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày
                    02/01/2007. GPMXH: 238/GP-BTTTT do Bộ Thông Tin và Truyền Thông cấp ngày 04/06/2020.
                    Địa chỉ: 128 Trần Quang Khải, P. Tân Định, Q.1, TP.Hồ Chí Minh. Điện thoại: 028 38125960. Email:
                    cskh@thegioididong.com. Chịu trách nhiệm nội dung: Huỳnh Văn Tốt. <a href="">Xem chính sách
                        sử dụng</a></p>
            </div>
        </div>

    </div>
    </div>

</body>
<script>
    function attach_value(li_selected) {

        $("#key_search").val($(li_selected).find(".search_ajax_list_li--name").text());


        $("#search_ajax").fadeOut();
        $(".header-top__search").submit();


    }
</script>
@include('client.footer')
