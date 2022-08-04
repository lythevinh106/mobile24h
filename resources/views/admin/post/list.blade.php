@extends('admin.main');


@section('content')
    <div class=""><a href="{{ route('admin.post.create') }}" class="btn btn-primary text-white fw-bold">Thêm<i
                class=" fa-solid fa-plus"></i> </a>
    </div>
    <div class="d-flex justify-content-between">
        <!-- Navbar Search-->
        <div class="w-30 p-0 mt-2">
            <form action="" class=" d-md-inline-block  ">


                <div class="input-group ">
                    <input class="form-control" name="search" type="text" placeholder="Nhập vào tên cần tìm"
                        aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                            class="fas fa-search"></i></button>
                </div>






            </form>
        </div>

        <div class="w-50">
            <form action="" class="w-100 d-flex justify-content-end ">


                <div class="w-80">
                    <select class="form-select w-100" name="sort" aria-label="Default select example">
                        <option disabled value="0">Sắp xếp tìm kiếm theo:</option>
                        <option value="desc">Mới Tới Cũ Nhất</option>
                        <option value="asc">Cũ Tới Mới Nhất</option>


                    </select>
                </div>
                <button class="btn btn-primary w-20" id="btnNavbarSearch" type="submit"><span class="fs-8">Áp
                        dụng</span></button>

            </form>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>

                <th scope="col">Tiêu Đề </th>

                <th scope="col">Ảnh Đại Diện</th>
                <th scope="col">Trạng Thái</th>


                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
                <tr id="row-{{ $post->id }}">

                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->name }}</td>


                    <td>{{ $post->title }}</td>
                    <td>
                        <img class="" style="width: 200px" src="{{ $post->feature_image }}" alt="">

                    </td>
                    <td>
                        {!! \App\Helpers\admin_helper::user_active($post->active) !!}


                    </td>
                    <td>
                        <button type="button" class="btn btn-info"><a class="text-light"
                                href="/admin/post/edit/{{ $post->id }}">Sửa</a></button>



                        <button type="button" class="btn btn-danger">
                            <a href="#"
                                onclick="removeRow({{ $post->id }},'/admin/post/delete/')">Xóa</a></button>




                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

    <div class="d-flex  justify-content-center"> {{ $posts->links() }}</div>
@endsection


@section('footer')
    <script></script>
@endsection
