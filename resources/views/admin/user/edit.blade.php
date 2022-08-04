@extends('admin.main');
@section('content')
    <div class="text-end"><a href="{{ route('admin.user.list') }}" class="btn btn-primary text-white fw-bold">Danh
            Sách
        </a>
    </div>
    <form method="post" action="/admin/user/update/{{ $user->id }}">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Đăng Nhập</label>
            <input value="{{ $user->name }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">


            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input value="{{ $user->email }}" type="email" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Vui lòng thêm đúng Email để liên hệ</div>
            @error('email')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thêm quyền cho sản phẩm</label>


            <select name="role_id[]" class="select2_init form-control" multiple="multiple">
                <option value=""></option>
                @foreach ($roles as $role)
                    <option {{ $user->roles->contains('id', $role->id) ? 'selected' : '' }} value="{{ $role->id }}">
                        {{ $role->name }}</option>
                @endforeach

            </select>
            @error('role_id')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror



        </div>

        <label for="" class="form-label">Kích Hoạt </label>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" value="1"
                {{ $user->active == 1 ? 'checked' : '' }} id="flexRadioDefault1">
            <label class="form-check-label" for="">
                Có
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" {{ $user->active == 0 ? 'checked' : '' }} type="radio" name="active"
                value="0" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                không
            </label>
        </div>
        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Sửa</button></div>
    </form>
@endsection
