@extends('admin.main')


@section('content')
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem">
                <div class="card-header">TRONG THÁNG {{ \Carbon\Carbon::now()->month }}</div>

                <div class="card-body">
                    <h5 class="card-title">{{ $order_finish_in_month }}</h5>
                    <p class="card-text">Đơn hàng giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem">
                <div class="card-header">TRONG THÁNG {{ \Carbon\Carbon::now()->month }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $order_wait_for_confirmation_in_month }}</h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem">
                <div class="card-header">TRONG THÁNG {{ \Carbon\Carbon::now()->month }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $order_transport_in_month }}</h5>
                    <p class="card-text"> đơn hàng đang vận chuyển</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem">
                <div class="card-header">TRONG THÁNG {{ \Carbon\Carbon::now()->month }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $order_cancel_in_month }}</h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->


    <div class="w-30">
        <div class="row">
            <div class="col-md-6">
                <form action="" class=" ">


                    <div class="input-group ">
                        <input class="form-control" name="search" value="{{ old('search') }}" type="text"
                            placeholder="Nhập vào Mã Vận Đơn Cần Tìm " aria-label="Search for..."
                            aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                                class="fas fa-search"></i></button>
                    </div>






                </form>



            </div>

            <div class="col-md-3 dropdown  text-white">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Lọc Theo Trạng Thái Đơn Hàng
                </button>
                <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">



                    <li style="">
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['fill_status' => 0]) }}">Đơn
                            Đang Xử
                            Lí</a>
                    </li>


                    <li style="">
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['fill_status' => 1]) }}">Đơn
                            Đang Vận Chuyển</a>
                    </li>
                    <li style="">
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['fill_status' => 2]) }}">Đơn
                            Đang Đã Hoàn Thành</a>

                    </li>
                    <li style="">
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['fill_status' => -1]) }}">Đơn
                            Bị Hủy</a>

                    </li>



                </ul>
            </div>

            <div class="col-md-3 dropdown  text-white">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Sắp Xếp Theo
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">



                    <li><a class="dropdown-item"
                            href="{{ request()->fullUrlWithQuery(['fill_other' => 'order_date', 'orderby' => 'desc']) }}">
                            Ngày Từ Mới Tới Cũ
                        </a>

                    </li>
                    <li><a class="dropdown-item"
                            href="{{ request()->fullUrlWithQuery(['fill_other' => 'order_date', 'orderby' => 'asc']) }}">
                            Ngày Từ Cũ Tới Mới
                        </a>

                    </li>



                </ul>
            </div>



        </div>
        <div class="card">
            <div class="card-header font-weight-bold">
                ĐƠN HÀNG MỚI
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>

                            <th scope="col">Khách hàng</th>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thanh Toán</th>
                            <th scope="col">Ngày Đặt</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $dem = 0;
                        @endphp

                        @foreach ($orders as $order)
                            @php
                                $dem++;
                            @endphp
                            <tr id="row-{{ $order->id }}">
                                <th scope="row">{{ $dem }}</th>

                                <td>
                                    @if ($order->user_id == null || $order->user_id < 0)
                                        {{ $order->customer->name }}
                                    @else
                                        {{ $order->user->name }}
                                    @endif


                                </td>
                                <td>{{ $order->order_token }}</td>
                                <td>

                                    @if ($order->user_id == null || $order->user_id < 0)
                                        {{ $order->customer->phone_number }}
                                    @else
                                        {{ $order->user->phone }}
                                    @endif


                                </td>
                                <td>
                                    @if ($order->user_id == null || $order->user_id < 0)
                                        {{ $order->customer->address }}
                                    @else
                                        {{ $order->user->address }}
                                    @endif
                                </td>
                                <td>
                                    {!! \App\Helpers\client_helper::status_active_admin($order->status) !!}

                                </td>
                                <td>
                                    {{ $order->payment == 0 ? 'Chưa Thanh Toán' : 'Đã Thanh Toán' }}

                                </td>
                                <td>{{ $order->order_date }}</td>
                                <td>
                                    <a href="{{ route('admin.order.edit', $order->id) }}"
                                        class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    @if ($order->status == -1)
                                        <a onclick="removeRow({{ $order->id }},'/admin/order/delete/')"
                                            class="btn
                                            btn-danger btn-sm rounded-0 text-white"
                                            type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    {{ $orders->links() }}
                </nav>
            </div>
        </div>
    @endsection
