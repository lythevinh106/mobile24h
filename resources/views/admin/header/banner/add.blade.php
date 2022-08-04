@extends('admin.main')
@section('content')
    <form method="post" action="{{ route('admin.header.store_banner') }}" enctype="multipart/form-data">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Banner</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Đặt Url </label>
            <input value="{{ old('url') }}" type="text" name="url" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('url')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn Ảnh Banner</label>
            <input type="file" id="upload" class="form-control">
            <div class="form-text">Vui lòng chọn ảnh có đuôi jpg,png,jpeg và ảnh có kích thước dưới 100mb</div>


            <div id="image_show" class="w-40 h-auto mt-2">

            </div>

            <input type="hidden" id="upload_thumb" name="feature_image">

            @error('feature_image')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror

        </div>



        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Thêm</button>
        </div>
    </form>
@endsection

@section('footer')
    <script type="text/javascript">
        uploadthumb("#upload", "/admin/upload/uploadthumb");
    </script>
@endsection
