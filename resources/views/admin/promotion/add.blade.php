@extends('admin.main')
@section('content')
    <div class="text-end"><a href="{{ route('admin.promotion.list') }}" class="btn btn-primary text-white fw-bold">Danh Sách
        </a>
    </div>


    <div class="mt-3"><a href="{{ route('admin.promotion.sync') }}" class="btn btn-primary text-white fw-bold ">Bấm
            vào
            đây để đồng bộ các chương trình khuyến mãi </a>
    </div>
    <form method="post" action="{{ route('admin.promotion.store') }}">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Khuyến Mãi</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">


            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tiêu Đề Khuyến Mãi Khuyến Mãi</label>
            <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">


            @error('title')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá Trị Khuyến Mãi</label>
            <input value="{{ old('value') }}" type="number" name="value" min="0" id="value_promotion">


            @error('value')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn Loại Khuyến Mãi</label>
            <div class="form-text">Nếu bạn chọn là % thì vui lòng nhập dưới 100%, nếu là giá thì bạn nhập theo giá trị
                khuyến mãi</div>
            <select class="form-select" name="type" id="type_promotion" aria-label="Default select example">

                <option value="0">Khuyến mãi theo % </option>
                <option value="1">Khuyến mãi theo giá</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn Ngày Bắt Đầu khuyến Mãi</label>

            <input value="{{ $time_now }}" type="datetime-local" name="start_date" class="form-control"
                aria-describedby="emailHelp">

            {{-- @error('start_date')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror --}}
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" value="2020-01-01" class="form-label">Chọn Ngày Kết Thúc khuyến Mãi</label>

            <input value="{{ $time_now }}" type="datetime-local" name="end_date" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">

            @error('end_date')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>


        <label for="" class="form-label">Kích Hoạt Hoạt Chương Trình Khuyến Mãi</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" value="1" checked id="flexRadioDefault1">
            <label class="form-check-label" for="">
                Có
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" value="0" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                không
            </label>
        </div>













        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Thêm</button>
        </div>
    </form>
@endsection

<script></script>
