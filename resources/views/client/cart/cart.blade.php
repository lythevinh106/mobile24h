@extends('client.layouts.main')




@section('content')
    <div class="modal-box modal-box__cart-clear-all">



        <h3>Chú Ý</h3>
        <p class="modal-box__title">Bạn có muốn xóa tất cả sản phẩm ra khỏi giỏ hàng không?</p>
        <div class="modal-box__btn">
            <button class="btn btn-no"><a>Hủy Bỏ</a hr></button>
            <button class="btn btn-yes"><a class="text-white" href="{{ route('cart.destroy') }}">Đồng Ý</a></button>
        </div>


    </div>
    <form action="/order/store" method="post">
        <div class="content-cart container">

            <!-- modal-box-clear-all -->




            <!-- modal-box-clear-item -->
            {{-- <div class="modal-box modal-box__cart-clear-item">



            <h3>Chú Ý</h3>
            <p class="modal-box__title">Bạn có muốn xóa sản phẩm ra khỏi giỏ hàng không?</p>
            <div class="modal-box__btn">
                <button class="btn btn-no">Hủy Bỏ</button>
                <button class="btn btn-yes">Đồng Ý</button>
            </div>


        </div> --}}



            <div class="content-cart-detail">
                <div class="content-cart-detail-top">
                    <div class="content-cart-detail-top__title">
                        Giỏ Hàng
                    </div>


                    @if (Cart::count() > 0)
                        <div class="btn content-cart-detail-top__clear-all">Xóa Tất Cả</div>
                    @endif
                </div>

                <div class="content-cart-detail-main">




                    {{-- <input type="submit" value="Cập nhật giỏ hàng" name="btn_update" class="bg-primary text-white btn"> --}}
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="check_parent" name="check_parent" onchange="check_all(this)"
                                        checked>
                                    {{-- onchange="check_children(this)" --}}
                                </th>
                                <th>
                                    Hình Ảnh
                                </th>
                                <th>
                                    Thông Tin
                                </th>

                                <th>
                                    Đơn Giá
                                </th>
                                <th>Số Lượng</th>

                                <th>Thành Tiền</th>
                                <th>Hành Động</th>
                            </tr>


                        </thead>

                        <tbody>

                            @if (Auth::check())




                                @isset($auth_products)
                                    @foreach ($auth_products as $item)
                                        {{-- @php
                                            dd($item);
                                        @endphp --}}
                                        <tr row-id={{ $item->id }}>
                                            <td><input class="check_children" onchange="check_children(this)" type="checkbox"
                                                    checked="true" value="{{ $item->product->id }}" name="check_children[]">
                                            </td>
                                            <td class="content-cart-detail-main__img">
                                                <img src="{{ $item->product->feature_image }}" alt="">
                                            </td>

                                            <td class="content-cart-detail-main__info">

                                                {{ $item->product->name }}

                                            </td>

                                            <td class="content-cart-detail-main__price">

                                                {{ \App\Helpers\client_helper::format_price($item->product->latest_price) }}

                                            </td>


                                            <td class="content-cart-detail-main__number">



                                                <input class="input_number_order"
                                                    onchange="updateAjax('{{ $item->product->id }}',this)" type="number"
                                                    min="1" max="10" name="qty[{{ $item->product->id }}]"
                                                    value={{ $item->quantity }}>



                                            </td>
                                            <td class="content-cart-detail-main__total-price">
                                                {{ \App\Helpers\client_helper::format_price($item->product->latest_price * $item->quantity) }}


                                            </td>
                                            {{-- hiddeen-input --}}
                                            <input type="hidden" value={{ $item->product->latest_price * $item->quantity }}
                                                class="content-cart-detail-main__total-price-hidden">

                                            <td class="content-cart-detail-main__clear"><a
                                                    href="{{ route('cart.remove', $item->product->id) }}">Xóa</a></td>
                                        </tr>
                                    @endforeach
                                @endisset
                            @else
                                @if (Cart::count() > 0)
                                    @foreach (Cart::content() as $item)
                                        <tr row-id={{ $item->id }}>
                                            <td><input class="check_children" onchange="check_children(this)"
                                                    type="checkbox" checked="true" value="{{ $item->id }}"
                                                    name="check_children[]">
                                            </td>
                                            <td class="content-cart-detail-main__img">
                                                <img src="{{ $item->options->feature_image }}" alt="">
                                            </td>

                                            <td class="content-cart-detail-main__info">

                                                {{ $item->name }}

                                            </td>

                                            <td class="content-cart-detail-main__price">

                                                {{ \App\Helpers\client_helper::format_price($item->price) }}

                                            </td>


                                            <td class="content-cart-detail-main__number">



                                                <input class="input_number_order"
                                                    onchange="updateAjax('{{ $item->rowId }}',this)" type="number"
                                                    min="1" max="10" name="qty[{{ $item->id }}]"
                                                    value={{ $item->qty }}>



                                            </td>
                                            <td class="content-cart-detail-main__total-price">
                                                {{ \App\Helpers\client_helper::format_price($item->subtotal) }}


                                            </td>
                                            {{-- hiddeen-input --}}
                                            <input type="hidden" value={{ $item->subtotal }}
                                                class="content-cart-detail-main__total-price-hidden">

                                            <td class="content-cart-detail-main__clear"><a
                                                    href="{{ route('cart.remove', $item->rowId) }}">Xóa</a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endif





                        </tbody>
                    </table>
                    @csrf

                </div>
            </div>

            <div class="content-cart-pay">

                <div class="content-cart-pay__title">
                    Thanh toán
                </div>

                <div class="content-cart-pay-main">

                    <div class="content-cart-pay-main__total">
                        <span>Tổng Tiền:</span>

                        <span class="content-cart-pay-main__total__price">
                            {{ \App\Helpers\client_helper::format_price(Auth::check() ? $auth_cart_total : Cart::total()) }}
                        </span>
                        @error('cart_total')
                            <div class="bg-danger px-3 mt-2
                        text-warning">{{ $message }}
                            </div>
                        @enderror

                        <input type="hidden" name="cart_total" class="content-cart-pay-main__total__price-hidden"
                            value={{ Auth::check() ? $auth_cart_total : Cart::total() }}>






                    </div>

                    <div class="content-cart-pay-main__payment-method">
                        <span>Phương Thức Thanh Toán:</span>

                        <div class="payment-method-wrapper">

                            <div class="payment-method" id="payment_cod_input"> <input onclick="hide_show_btn_payment(this)"
                                    name="payment_method" checked type="radio" value="0" />
                                <span>Thanh toán sau khi nhận hàng</span>
                            </div>

                            @if (Auth::check())
                                <div class="payment-method" id="payment_online_input"> <input
                                        onclick="hide_show_btn_payment(this)" name="payment_method" type="radio"
                                        value="1" />
                                    <span>Thanh toán online</span>
                                </div>
                            @endif



                        </div>

                    </div>
                </div>

                @if (!Auth::check())
                    <div class="content-cart-pay-order">
                        <div class="content-cart-pay-order__title">
                            Thông tin đặt hàng
                        </div>
                        <div class="content-cart-pay-order__warring">
                            Bạn cần nhập đầy đủ các trường thông tin có dấu *
                        </div>
                        <input class="content-cart-pay-order__name" value="{{ old('name') }}" name="name"
                            type="text" placeholder="Họ Và Tên *">
                        @error('name')
                            <div class="bg-danger px-3 mt-2 text-warning">{{ $message }}

                            </div>
                        @enderror

                        <input class="content-cart-pay-order__phone" value="{{ old('phone') }}" type="text"
                            name="phone" placeholder="Số Điện Thoại *">
                        @error('phone')
                            <div class="bg-danger px-3 mt-2 text-warning">{{ $message }}

                            </div>
                        @enderror
                        <select class="content-cart-pay-order__city" name="province" onchange="load_select(this)">
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach



                        </select>



                        <select class="content-cart-pay-order__district" name="district">

                            @include('client.cart.component.district')


                        </select>


                        <textarea rows="9" class="content-cart-pay-order__note" name="address" value="{{ old('address') }}"
                            placeholder="Địa chỉ cụ thể"></textarea>
                        @error('address')
                            <div class="bg-danger px-3 mt-2 text-warning">{{ $message }}

                            </div>
                        @enderror

                        <input class="content-cart-pay-order__email" type="text" name="email"
                            value="{{ old('email') }}" placeholder="Email">
                        @error('email')
                            <div class="bg-danger px-3 mt-2 text-warning">{{ $message }}

                            </div>
                        @enderror
                        <textarea rows="9" class="content-cart-pay-order__note" name="other" value="{{ old('other') }}"
                            placeholder="Ghi Chú"></textarea>
                        @error('other')
                            <div class="bg-danger px-3 mt-2 text-warning">{{ $message }}

                            </div>
                        @enderror
                    </div>
                @else
                    <div class="content-cart-pay-order">
                        <div class="content-cart-pay-order__title">
                            Thông tin đặt hàng
                        </div>
                        <div class="content-cart-pay-order__warring">
                            Vui lòng xem lại thông tin nhận hàng của bạn nếu muốn chỉnh sửa hay <a
                                href="{{ route('info.show') }}">nhấn vào
                                đây</a>

                        </div>








                    </div>
                @endif



                @csrf


                @if (Auth::check())
                    @if ($auth_cart_total > 0)
                        <input class="content-cart-pay-submit" id="payment-btn-cod" type="submit"
                            value="Tiến Hành Thanh Toán">
                    @endif
                @else
                    @if (Cart::total() > 0)
                        <input class="content-cart-pay-submit" id="payment-btn-cod" type="submit"
                            value="Tiến Hành Thanh Toán">
                    @endif
                @endif






                <!-- /////order is login -->

                {{--  --}}
                {{-- <input class="content-cart-pay-submit" type="submit" value="Tiến Hành Thanh Toán"> --}}




                <!-- ///end order is login -->


                @if (Auth::check() && $auth_cart_total > 0)
                    <div class="payment-method   mt-3 " id="payment-btn-online">







                        <button type="submit" class="btn btn-warning bg-warning"><span class="text-info">Bạn có thể
                                thanh toán qua</span>

                            <img width="60x"
                                src="data:image/png;base64,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"
                                alt=""></button>

                    </div>
                @endif



            </div>
        </div>
    </form>
@endsection


@section('js')
    <script></script>
@endsection
