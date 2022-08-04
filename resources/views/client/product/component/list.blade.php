@foreach ($products as $product)
    <div class="product-main__show-item">
        <div class="product-main__show-item__img">
            <a href="{{ route('load_detail_product', $product->id) }}"> <img class="lazy"
                    src=" {{ $product->feature_image }}" alt=""></a>
        </div>

        <div class="product-main__show-item__sale sale--vnpay">
            <img class="lazy" src=" {{ asset('client/images/icon6-50x50.png') }} " alt="">
            <span>VNPAY GIẢM 500K</span>
        </div>

        <div class="product-main__show-item__name">
            <a href="{{ route('load_detail_product', $product->id) }}"> {{ $product->name }}</a>
        </div>

        <div class="product-main__show-item__price">
            {{ \App\Helpers\Client_helper::format_price($product->latest_price) }}
        </div>

        <div class="product-main__show-item__cart cart--main">
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
