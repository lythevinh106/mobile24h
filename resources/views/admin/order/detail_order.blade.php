@extends('admin.main');
@section('content')
    <form method="post" action="{{ route('admin.order.update', $order->id) }}">
        <table class="table table-success">
            <thead>
                <tr>
                    <th scope="col">#</th>




                    <th scope="col">Tên Hàng Hóa</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số Lượng</th>


                </tr>
            </thead>
            <tbody>

                @php
                    $dem = 0;
                @endphp

                @foreach ($order->order_items as $order_item)
                    @php
                        $dem++;
                    @endphp
                    <tr>
                        <th scope="row">{{ $dem }}</th>

                        <td>

                            {{ $order_item->product->name }}

                        </td>
                        <td> <img width="80px" src="{{ $order_item->product->feature_image }}" alt=""></td>
                        <td>

                            {{ \App\Helpers\client_helper::format_price($order_item->product->latest_price) }}


                        </td>
                        <td>

                            <input readonly type="number" value="{{ $order_item->quantity }}"
                                name="qty[{{ $order_item->product_id }}]">

                        </td>




                    </tr>
                @endforeach

            </tbody>
        </table>


        <p class="h4  text-warning">Tổng Tiền: {{ \App\Helpers\client_helper::format_price($order_total) }}</p>

        <p class="h2 text-center text-info">Thông Tin Khách Hàng</p>







        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Khách Hàng</label>
            <input type="text"
                value="@if ($order->user_id == null || $order->user_id < 0) {{ $order->customer->name }}
        @else
 {{ $order->user->name }} @endif"
                name="name" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <label for="floatingTextarea">Đia Chỉ</label>
        <div class="form-floating">

            <textarea readonly class="form-control" name="address" placeholder="Leave a comment here" id="floatingTextarea">
@if ($order->user_id == null || $order->user_id < 0)
{{ $order->customer->address }}
@else
{{ $order->user->address }}
@endif
</textarea>

        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">SDT</label>
            <input type="text" class="form-control" readonly name="phone"
                value="@if ($order->user_id == null || $order->user_id < 0) {{ $order->customer->phone_number }}
        @else
{{ $order->user->phone }} @endif"
                id="exampleInputPassword1">
        </div>


        @if ($order->payment == 1)
            <div class="mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Trạng Thái Đơn Hàng</label>
                <select class="form-select" name="payment" id="inputGroupSelect01">


                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đã Thanh Toán</option>


                </select>
            </div>
        @else
            <div class="mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Trạng Thái Đơn Hàng</label>
                <select class="form-select" name="payment" id="inputGroupSelect01">

                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chưa Thanh Toán</option>
                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đã Thanh Toán</option>


                </select>
            </div>
        @endif






        <div class="mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Trạng Thái Đơn Hàng</label>
            <select class="form-select" name="status" id="inputGroupSelect01">

                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chờ Xác Nhận</option>
                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang Vận Chuyển</option>
                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đã Hoàn Thành</option>
                <option value="-1" {{ $order->status == -1 ? 'selected' : '' }}>Hủy Đơn</option>

            </select>
        </div>









        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Cập Nhật Đơn
                Hàng</button></div>
    </form>
@endsection
