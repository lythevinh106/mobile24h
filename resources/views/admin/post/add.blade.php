@extends('admin.main')
@section('content')
    <div class="text-end"><a href="{{ route('admin.post.list') }}" class="btn btn-primary text-white fw-bold">Danh Sách
        </a>
    </div>
    <form method="post" action="/admin/post/store" enctype="multipart/form-data">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Bài Viết</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>






        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tiêu Đề Bài Viết</label>
            <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('title')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn Ảnh Đại Diện</label>
            <input type="file" id="upload" class="form-control">
            <div class="form-text">Vui lòng chọn ảnh có đuôi jpg,png,jpeg và ảnh có kích thước dưới 100mb</div>


            <div id="image_show" class="w-40 h-auto mt-2"></div>

            <input type="hidden" id="upload_thumb" name="feature_image">

            @error('feature_image')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror

        </div>







        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nội dung Sản Phẩm</label>
            <textarea rows="30" name="content" id="myTextarea" class="form-control"></textarea>


            @error('content')
                <div class="bg-danger px-3 mt-2
                text-warning">{{ $message }}
                </div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn Danh Mục Sản Phẩm</label>
            <select class="form-select" name="post_category_id" aria-label="Default select example">
                {{-- <option selected value="0">Danh Mục Cha</option> --}}
                {!! App\Helpers\admin_helper::recursive_select($post_categories) !!}
            </select>
        </div>









        <label for="" class="form-label">Kích Hoạt</label>
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

@section('footer')
    <script type="text/javascript">
        tinyMce('#myTextarea');
        uploadthumb("#upload", "/admin/upload/uploadthumb");
    </script>
@endsection
