@extends('admin.main');
@section('content')
    <form method="post" action="/admin/info/update/{{ $info->id }}">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Đăng Nhập</label>
            <input value="{{ $info->name }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">


            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input value="{{ $info->email }}" type="email" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Vui lòng thêm đúng Email để liên hệ</div>
            @error('email')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Bạn muốn thay đổi mật khẩu ?


                <a href="{{ route('admin.info.show_password') }}"> Ấn vào
                    Đây</a></label>


        </div>



        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Lưu Chỉnh
                Sửa</button>
        </div>
    </form>
@endsection
