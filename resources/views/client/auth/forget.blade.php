@extends('client.layouts.main')


@section('content')
    <!-- modal box -login -->
    <div class="login-modal container">

        <!-- ////btn_close -->



        <div class="login-modal__img">
            <img src="{{ asset('client/images/login.png') }}" alt=""></a>
        </div>

        <div class="login-modal__main">

            <form action="{{ route('client.take_password') }}" method="post">
                @csrf

                <h3 class="login-modal__main__title">Lấy Lại Mật Khâu</h3>


                <hr class="login-modal__main__line">



                <div class="login-modal__main__name">
                    <label for="email">Nhập Vào Email Đã Đăng Kí</label>
                    <input value="{{ old('email') }}" type="text" name="email">
                </div>
                @error('email')
                    <div class="bg-danger px-3 mt-2
       text-warning">{{ $message }}
                    </div>
                @enderror



                @error('password')
                    <div class="bg-danger px-3 mt-2
   text-warning">{{ $message }}
                    </div>
                @enderror




                <div class="login-modal__main__btn">
                    <button class="" type="submit">Lấy Lại Mật Khẩu</button>

                </div>


            </form>
        </div>


    </div>
@endsection
