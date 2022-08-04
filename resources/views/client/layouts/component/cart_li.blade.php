<li>

    <div class="header-top__cart-detail__img"> <img src="{{ $product->feature_image }} " alt="">
    </div>
    <div class="header-top__cart-detail-main">
        <div class="header-top__cart-detail-main__name"> {{ $product->name }}</div>
        <div class="header-top__cart-detail-main__number"> Số lượng :
            <span class="cart-info-{{ $product->id }}" id="cart-info-{{ $product->id }}">1</span>
        </div>

        <div class="header-top__cart-detail-main__price"> Giá :
            <span> {{ \App\Helpers\client_helper::format_price($product->latest_price) }}
            </span>
        </div>
    </div>
</li>
