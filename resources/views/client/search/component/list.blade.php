@foreach ($products as $product)
    <div class="product-main__show-item">
        <div class="product-main__show-item__img">
            <img class="lazy" src=" {{ $product->feature_image }}" alt="">
        </div>

        <div class="product-main__show-item__sale sale--vnpay">
            <img class="lazy" src=" {{ asset('client/images/icon6-50x50.png') }} " alt="">
            <span>VNPAY GIẢM 500K</span>
        </div>

        <div class="product-main__show-item__name">
            <a> {{ $product->name }}</a>
        </div>

        <div class="product-main__show-item__price">
            {{ \App\Helpers\Client_helper::format_price($product->latest_price) }}
        </div>

        <div class="product-main__show-item__cart cart--main">
            <span><a href="">Thêm <i class="fa-solid fa-cart-shopping"></i></a></span>

            <span><a href="">Mua<i class="fa-solid fa-dollar-sign"></i></a></span>

        </div>


    </div>
@endforeach
