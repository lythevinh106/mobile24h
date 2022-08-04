<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <link href="{{ asset('admin/css/login.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<style>



</style>

<body>


    <div class="login-box">

        {{-- @if ($errors->any())

            
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif --}}




        @if (session('fail'))
            <div class="alert alert-danger ">
                {{ session('fail') }}
            </div>
        @endif



        <h2>Login</h2>

        <form action="{{ route('admin.check') }}" method="post">
            <div class="user-box">
                <input type="text" name="name" required="">
                <label>Username</label>

                @error('name')
                    <div class="alert alert-danger ">

                        {{ $message }}

                    </div>
                @enderror



            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>

                @error('password')
                    <div class="alert alert-danger ">

                        {{ $message }}

                    </div>
                @enderror
            </div>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input type="submit" value="Đăng Nhập">
            </a>
            @csrf
        </form>
    </div>
</body>

</html>

<script></script>
