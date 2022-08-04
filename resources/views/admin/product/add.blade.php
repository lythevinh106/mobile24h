@extends('admin.main')
@section('content')
    <div class="text-end"><a href="{{ route('admin.product.list') }}" class="btn btn-primary text-white fw-bold">Danh
            Sách
        </a>
    </div>
    <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
            <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá Tiền</label>
            <input value="{{ old('price') }}" type="number" name="price" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">

            <div class="form-text">Giá tiền sản phẩm phải lớn hơn giá khuyến mãi của nó</div>
            @error('price')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Giá Tiền Khuyến Mãi</label>
            <input value="{{ old('price_sale') }}" type="number" name="price_sale" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('price_sale')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nhập Số Lượng Sản Phẩm</label>
            <input value="{{ old('number_product_quantity') }}" type="number" name="number_product_quantity"
                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('number_product_quantity')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>






        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tiêu Đề Sản Phẩm</label>
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
            <label for="exampleInputEmail1" class="form-label">Chọn Ảnh Nhỏ Đại Diện</label>
            <input type="file" id="multiupload" multiple class="form-control" name="multiimages[]">
            <div class="form-text">Vui lòng chọn ảnh có đuôi jpg,png,jpeg và ảnh có kích thước dưới 100mb</div>

            <div id="image_multi_show" class=" h-auto mt-2"></div>


            <div id="box-upload">
                {{-- small_image is value of multiupload --}}
                {{-- <input hidden type="hidden" id="multiupload_thumb" name="small_image[]"> --}}
            </div>

            @error('small_image')
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
            <label for="exampleInputEmail1" class="form-label">Thêm tag cho sản phẩm</label>
            <div class="form-text">* có thể bỏ trống mục này</div>

            <select name="tag_id[]" class="select2_init form-control" multiple="multiple">
                <option value=""></option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach

            </select>



        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Thêm Khuyến Mãi cho sản phẩm</label>
            <div class="form-text">bạn có thể đưa sản phẩm này vào chương trình khuyến mãi *có thể bỏ trống mục này</div>

            <select name="promotion_id" class="form-control">
                <option value=""></option>
                @foreach ($promotions as $promotion)
                    <option value="{{ $promotion->id }}">{{ $promotion->name }}</option>
                @endforeach

            </select>



        </div>

        {{-- config --}}

        <div class="bg-dark bg-gradient text-white text-center py-1"> Cấu hình</div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hãng</label>
            <div class="form-text">* có thể bỏ trống mục này</div>
            <input value="{{ old('conpany') }}" type="text" name="company" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">


            @error('company')
                <div class="bg-danger px-3 mt-2
                text-warning">{{ $message }}
                </div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Màn Hình</label>
            <div class="form-text">* có thể bỏ trống mục này</div>
            <input value="{{ old('screen') }}" type="text" name="screen" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">


            @error('screen')
                <div class="bg-danger px-3 mt-2
                text-warning">{{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ram</label>
            <div class="form-text">* có thể bỏ trống mục này</div>
            <input value="{{ old('ram') }}" type="number" name="ram" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">


            @error('ram')
                <div class="bg-danger px-3 mt-2
                text-warning">{{ $message }}
                </div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Rom</label>
            <div class="form-text">* có thể bỏ trống mục này</div>
            <input value="{{ old('rom') }}" type="number" name="rom" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">


            @error('rom')
                <div class="bg-danger px-3 mt-2
                text-warning">{{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Khác</label>
            <div class="form-text">* có thể bỏ trống mục này</div>
            <input value="{{ old('other') }}" type="text" name="other" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">


            @error('other')
                <div class="bg-danger px-3 mt-2
                text-warning">{{ $message }}
                </div>
            @enderror
        </div>








        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn Danh Mục Sản Phẩm</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                {{-- <option selected value="0">Danh Mục Cha</option> --}}
                {!! App\Helpers\admin_helper::recursive_select($categories) !!}
            </select>
        </div>









        <label for="" class="form-label">Kích Hoạt</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" value="1" checked
                id="flexRadioDefault1">
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
        multi_uploadthumb("#multiupload", "/admin/upload/multiupload_thumb", "file2[]")
    </script>
@endsection
