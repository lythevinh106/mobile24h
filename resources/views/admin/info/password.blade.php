@extends('admin.main');
@section('content')
    <form method="post" action="/admin/info/update_password/{{ $info->id }}">


        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nhập Vào Mật Khẩu Cũ </label>
            <input type="password" value="{{ old('old_password') }}" name="old_password" class="form-control"
                id="exampleInputPassword1">
            @error('old_password')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nhập Vào Mật Khẩu Mới </label>
            <input type="password" value="{{ old('new_password') }}" name="new_password" class="form-control"
                id="exampleInputPassword1">
            @error('new_password')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nhập Lại Mật Khẩu Mới </label>
            <input type="password" value="{{ old('re_new_password') }}" name="re_new_password" class="form-control"
                id="exampleInputPassword1">
            @error('re_new_password')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>




        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Lưu Chỉnh
                Sửa</button>
        </div>
    </form>
@endsection
