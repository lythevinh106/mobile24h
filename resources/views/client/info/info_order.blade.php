@extends('client.layouts.main')


@section('content')
    <div class="content-info container">

        @include('client.info.component.sidebar')







        <!-- /////main -->




        <!-- don hang -->

        <div class="content-info-order">
            <div class="content-info-order__title">
                Thông tin đơn hàng bạn đã đặt
            </div>



            @foreach ($order_items as $item)
                <div class="content-info-order__main">
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
                                {{ \App\Helpers\client_helper::format_price($item->product->latest_price) }}
                            </div>


                        </div>

                        <div class="order__main-item__status">
                            <div class="order__main-item__status__title">
                                Trạng Thái
                            </div>

                            {!! \App\Helpers\client_helper::status_active($item->order->status) !!}

                        </div>
                    </div>








                </div>
            @endforeach
            <div class="d-flex  justify-content-center mt-5"> {{ $order_items->links() }}</div>
        </div>


    </div>
@endsection
