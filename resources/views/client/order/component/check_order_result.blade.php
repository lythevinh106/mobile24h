<div class="content-info-order__title">
    Thông tin đơn hàng tra cứu được
</div>
<div class="content-info-order__main">





    @foreach ($order_items as $item)
        <div class="order__main-item">
            <div class="order__main-item__img">
                <img src="{{ $item->product->feature_image }}" alt="">
            </div>
            <div class="order__main-item__content">
                <div class="order__main-item__content__name">
                    {{ $item->product->name }}
                </div>

                <div class="order__main-item__content__number">
                    <span>Số lượng: </span> <span>{{ $item->quantity }}</span>
                </div>
                <div class="order__main-item__content__price">
                    {{ $item->product->latest_price }}
                </div>


            </div>

            <div class="order__main-item__status">
                <div class="order__main-item__status__title">
                    Trạng Thái
                </div>
                {!! \App\Helpers\client_helper::status_active($item->order->status) !!}
            </div>
        </div>
    @endforeach
</div>
