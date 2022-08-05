{{-- @php
dd($categories); /// view ddc lay tu view composer:https://sethphat.com/sp-893/laravel-view-composer-basic
@endphp --}}

<div class="header-main container">
    <ul class="menu-parent row">
        <li class="col-md-2"><i class="fa-solid fa-dumpster"></i><a href="{{ route('promotion-client') }}">Tổng Hợp
                Khuyến Mãi</a>


        </li>

        @foreach ($categories as $category)
            @php
                // dd($categories);
            @endphp
            @if ($category->parent_id == 0)
                @php
                    
                    $str_convert = \App\Helpers\client_helper::convert_str($category->name);
                @endphp
                <li class="col-md-2"><a
                        href="/danh-muc/{{ $category->id }}-{{ Str::slug($str_convert, '-') }} ">{{ $category->name }}</a>



                    @if ($category->category_children->count() > 0)
                        <ul class="menu-children">
                            @foreach ($category->category_children as $category_children)
                                @if ($category_children->active == 1)
                                    @php
                                        $str_convert = \App\Helpers\client_helper::convert_str($category_children->name);
                                    @endphp
                                    <li><a
                                            href="/danh-muc/{{ $category_children->id }}-{{ Str::slug($str_convert, '-') }} ">{{ $category_children->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif


                </li>
            @endif
        @endforeach

        {{-- <li class="col-md-2"><i class="fa-solid fa-mobile-screen-button"></i><a>Điện thoại</a>

            <ul class="menu-children">
                <li>Hãng Điện Thoại </li>
                <li><a>Hãng 1</a></li>
                <li><a>Hãng 1</a></li>
                <li><a>Hãng 1</a></li>


            </ul>
        </li>
        <li class="col-md-2"><i class="fa-solid fa-laptop"></i><a>Laptop</a>

            <ul class="menu-children">
                <li>Hãng Điện Thoại </li>
                <li><a>Hãng 1</a></li>
                <li><a>Hãng 1</a></li>
                <li><a>Hãng 1</a></li>


            </ul>
        </li>
        <li class="col-md-2"><i class="fa-solid fa-tablet-button"></i><a>Tablet</a></li>
        <li class="col-md-2"><i class="fa-solid fa-headphones"></i><a>Phụ Kiện</a></li>
        <li class="col-md-2"><i class="fa-solid fa-chair"></i><a>Gia dụng</a></li>

        <li class="col-md-2"><i class="fa-solid fa-computer"></i><a>Máy tính</a></li> --}}

    </ul>

</div>
