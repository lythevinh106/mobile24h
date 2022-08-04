@extends('client.layouts.main')


@section('content')
    <!-- modal box -login -->
    <div class="login-modal container">

        <!-- ////btn_close -->



        <div class="login-modal__img">
            <img src="{{ asset('client/images/login.png') }}" alt=""></a>
        </div>

        <div class="login-modal__main">

            <form action="{{ route('client.store.take_password', $user_id) }}" method="post">
                @csrf

                <h3 class="login-modal__main__title">Lấy Lại Mật Khâu</h3>


                <hr class="login-modal__main__line">



                <div class="login-modal__main__name">
                    <label for="email">Tên Email</label>
                    <input readonly value="{{ $email }}" type="text" name="email">
                </div>
                @error('email')
                    <div class="bg-danger px-3 mt-2
       text-warning">{{ $message }}
                    </div>
                @enderror


                <div class="login-modal__main__name">
                    <label for="password">Nhập mật khẩu mới</label>
                    <input type="password" name="password">
                </div>
                @error('password')
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
                    <button class="" type="submit">Lưu Mật Khẩu Mới</button>

                </div>


            </form>
        </div>


    </div>
@endsection
