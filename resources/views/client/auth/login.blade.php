@extends('client.layouts.main')


@section('content')
    <!-- modal box -login -->
    <div class="login-modal container">

        <!-- ////btn_close -->



        <div class="login-modal__img">
            <img src="{{ asset('client/images/login.png') }}" alt=""></a>
        </div>

        <div class="login-modal__main">

            <form action="{{ route('client.check') }}" method="post">
                @csrf

                <h3 class="login-modal__main__title">Đăng Nhập</h3>


                <hr class="login-modal__main__line">



                <div class="login-modal__main__name">
                    <label for="email">Tài Khoản</label>
                    <input value="{{ old('email') }}" type="text" name="email">
                </div>
                @error('email')
                    <div class="bg-danger px-3 mt-2
       text-warning">{{ $message }}
                    </div>
                @enderror


                <div class="login-modal__main__password">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" name="password">


                </div>

                @error('password')
                    <div class="bg-danger px-3 mt-2
   text-warning">{{ $message }}
                    </div>
                @enderror


                <div class="login-modal__main__remember">
                    <input checked name="remember" type="checkbox">
                    <label for="">nhớ mật khẩu</label>
                </div>

                <div class="login-modal__main__btn">
                    <button class="" type="submit">Đăng Nhập</button>
                    <div class="" id="btn-register"><a href="{{ route('client.register') }}"> Đăng Kí</a></div>
                </div>


                <div class="login-modal__main__forget">
                    <a href="{{ route('client.forget_password') }}">Quên Mật Khẩu?</a>
                </div>
            </form>
        </div>


    </div>
@endsection
