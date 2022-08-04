@extends('client.layouts.main')


@section('content')
    <div class="content-info container">

        @include('client.info.component.sidebar')







        <!-- /////main -->

        <div class="content-info-main">
            <h3 class="content-info-main__title">
                Thông tin tài khoản
            </h3>



            <form method="POST" action="{{ route('info.store') }}">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" readonly value="{{ Auth::user()->email }}" class="form-control"
                            id="inputEmail3">
                    </div>
                    @error('email')
                        <div class="bg-danger px-3 mt-2
                     text-warning">{{ $message }}
                        </div>
                    @enderror

                </div>



                <div class="row mb-3">
                    <label for="inputPassword3" class="col-md-2 col-form-label">SDT Nhận Hàng</label>
                    <div class="col-md-8">
                        <input type="text" name="phone" value={{ Auth::user()->phone }} class="form-control"
                            id="inputPassword3">
                    </div>
                    @error('phone')
                        <div class="bg-danger px-3 mt-2
                     text-warning">{{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="row mb-3">
                    <label for="inputPassword3" class="col-md-2 col-form-label">Tên Xưng Hô</label>
                    <div class="col-md-8">
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                    </div>
                    @error('name')
                        <div class="bg-danger px-3 mt-2
                     text-warning">{{ $message }}
                        </div>
                    @enderror

                </div>

                @csrf


                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Địa Chỉ Nhận Hàng</label>
                    <div class="col-md-8">
                        <textarea class="" name="address" id="" cols="auto" rows="4">{{ Auth::user()->address }}</textarea>
                    </div>
                    @error('address')
                        <div class="bg-danger px-3 mt-2
                     text-warning">{{ $message }}
                        </div>
                    @enderror

                </div>


                <button type="submit" class="mx-auto btn btn-primary bg-primary center mt-20">Cập nhật</button></d>

            </form>
        </div>


        <!-- don hang -->

        {{-- <div class="content-info-order">
            <div class="content-info-order__title">
                Thông tin đơn hàng bạn đã đặt
            </div>
            <div class="content-info-order__main">
                <div class="order__main-item">
                    <div class="order__main-item__img">
                        <img src="images/tab2.jpg" alt="">
                    </div>
                    <div class="order__main-item__content">
                        <div class="order__main-item__content__name">
                            XiaoMi Note 11 Pro 5G
                        </div>

                        <div class="order__main-item__content__number">
                            <span>Số lượng: </span> <span>5</span>
                        </div>
                        <div class="order__main-item__content__price">
                            500.000 Đ
                        </div>


                    </div>

                    <div class="order__main-item__status">
                        <div class="order__main-item__status__title">
                            Trạng Thái
                        </div>
                        <div class="order__main-item__status__main">
                            Đang Vận Chuyển
                        </div>
                    </div>
                </div>

                <div class="order__main-item">
                    <div class="order__main-item__img">
                        <img src="images/tab2.jpg" alt="">
                    </div>
                    <div class="order__main-item__content">
                        <div class="order__main-item__content__name">
                            XiaoMi Note 11 Pro 5G
                        </div>

                        <div class="order__main-item__content__number">
                            <span>Số lượng: </span> <span>5</span>
                        </div>
                        <div class="order__main-item__content__price">
                            500.000 Đ
                        </div>


                    </div>

                    <div class="order__main-item__status">
                        <div class="order__main-item__status__title">
                            Trạng Thái
                        </div>
                        <div class="order__main-item__status__main">
                            Đã Nhận Hàng
                        </div>
                    </div>
                </div>

                <div class="order__main-item">
                    <div class="order__main-item__img">
                        <img src="images/tab2.jpg" alt="">
                    </div>
                    <div class="order__main-item__content">
                        <div class="order__main-item__content__name">
                            XiaoMi Note 11 Pro 5G
                        </div>

                        <div class="order__main-item__content__number">
                            <span>Số lượng: </span> <span>5</span>
                        </div>
                        <div class="order__main-item__content__price">
                            500.000 Đ
                        </div>


                    </div>

                    <div class="order__main-item__status">
                        <div class="order__main-item__status__title">
                            Trạng Thái
                        </div>
                        <div class="order__main-item__status__main">
                            Đã Nhận Hàng
                        </div>
                    </div>
                </div>

                <div class="order__main-item">
                    <div class="order__main-item__img">
                        <img src="images/tab2-2.jpeg" alt="">
                    </div>
                    <div class="order__main-item__content">
                        <div class="order__main-item__content__name">
                            XiaoMi Note 11 Pro 5G
                        </div>

                        <div class="order__main-item__content__number">
                            <span>Số lượng: </span> <span>5</span>
                        </div>
                        <div class="order__main-item__content__price">
                            500.000 Đ
                        </div>


                    </div>

                    <div class="order__main-item__status">
                        <div class="order__main-item__status__title">
                            Trạng Thái
                        </div>
                        <div class="order__main-item__status__main">
                            Đã Nhận Hàng
                        </div>
                    </div>
                </div>

                <div class="order__main-item">
                    <div class="order__main-item__img">
                        <img src="images/sale-laptop1.jpg" alt="">
                    </div>
                    <div class="order__main-item__content">
                        <div class="order__main-item__content__name">
                            XiaoMi Note 11 Pro 5G
                        </div>

                        <div class="order__main-item__content__number">
                            <span>Số lượng: </span> <span>5</span>
                        </div>
                        <div class="order__main-item__content__price">
                            500.000 Đ
                        </div>


                    </div>

                    <div class="order__main-item__status">
                        <div class="order__main-item__status__title">
                            Trạng Thái
                        </div>
                        <div class="order__main-item__status__main">
                            Đã Nhận Hàng
                        </div>
                    </div>
                </div>
            </div>

        </div> --}}

    </div>
@endsection
