@extends('client.layouts.main')


@section('content')
    <!-- modal box -login -->
    <div class="login-modal container">

        <!-- ////btn_close -->



        <div class="login-modal__img">
            <img src="{{ asset('client/images/login.png') }}" alt=""></a>
        </div>

        <div class="login-modal__main">

            <form action="{{ route('client.register.store') }}" method="POST">


                <h3 class="login-modal__main__title">Đăng Kí</h3>


                <hr class="login-modal__main__line">



                <div class="login-modal__main__name">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="bg-danger px-3 mt-2
                         text-warning">{{ $message }}
                    </div>
                @enderror


                <div class="login-modal__main__password">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" value="{{ old('password') }}" name="password">


                </div>
                @error('password')
                    <div class="bg-danger px-3 mt-2
                     text-warning">{{ $message }}
                    </div>
                @enderror





                <div class="login-modal__main__name">
                    <label for="name">Tên Xưng Hô</label>
                    <input type="text" value="{{ old('name') }}" name="name">
                </div>
                @error('name')
                    <div class="bg-danger px-3 mt-2
                         text-warning">{{ $message }}
                    </div>
                @enderror




                <div class="login-modal__main__name">
                    <label for="ephone">Số Điện Thoại</label>
                    <input type="text" value="{{ old('phone') }}" name="phone">
                </div>
                @error('phone')
                    <div class="bg-danger px-3 mt-2
                         text-warning">{{ $message }}
                    </div>
                @enderror
                @csrf
                <div class="login-modal__main__name">
                    <label for="ephone">Địa Chỉ</label>
                </div>
                <select class="content-cart-pay-order__city" name="province" onchange="load_select(this)">
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach



                </select>




                <select class="content-cart-pay-order__district" name="district">

                    @include('client.cart.component.district')


                </select>

                <textarea style="width:100%" rows="9" wi class="content-cart-pay-order__note" name="address" value=""
                    placeholder="Địa chỉ cụ thể"></textarea>



                @error('address')
                    <div class="bg-danger px-3 mt-2
                         text-warning">{{ $message }}
                    </div>
                @enderror





                {{-- <div class="login-modal__main__remember">
                    <input name="remember" type="checkbox">
                    <label for="">nhớ mật khẩu</label>
                </div> --}}

                <div class="login-modal__main__btn">

                    <button class="" type="submit">Đăng Kí</button>
                    <div class="" id="btn-register"><a href="{{ route('client.register') }}"> Đã Có tài khoản?</a>
                    </div>
                </div>
        </div>


        <div class="login-modal__main__forget">
            <a href="">Quên Mật Khẩu?</a>
        </div>



    </div>


    </div>


    </form>
@endsection
