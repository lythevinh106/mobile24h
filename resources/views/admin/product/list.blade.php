@extends('admin.main');


@section('content')
    <div class=""><a href="{{ route('admin.product.create') }}" class="btn btn-primary text-white fw-bold">Thêm<i
                class=" fa-solid fa-plus"></i> </a>
    </div>
    <div class="d-flex justify-content-between  mt-2">
        <!-- Navbar Search-->
        <div class="w-30">
            <form action="" class=" ">


                <div class="input-group ">
                    <input class="form-control" name="search" type="text" placeholder="Nhập vào tên cần tìm"
                        aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                            class="fas fa-search"></i></button>
                </div>






            </form>
        </div>


        <div class="w-20  " style="cursor: pointer">


            <div class="dropdown bg-primary text-whit">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Lọc Theo Danh Muc
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">


                    @foreach ($parents as $parent)
                        <li><a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['fill_category' => $parent->id]) }}">{{ $parent->name }}</a>
                        </li>
                    @endforeach


                </ul>
            </div>


        </div>


        <div class="w-20" style="cursor: pointer">


            <div class="dropdown bg-primary text-whit">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Lọc
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                    <li><a class="dropdown-item"
                            href="{{ request()->fullUrlWithQuery(['order_by' => 'price', 'sort' => 'asc']) }}">Giá
                            Từ Thấp Đến Cao</a></li>


                    <li><a class="dropdown-item"
                            href="{{ request()->fullUrlWithQuery(['order_by' => 'price', 'sort' => 'desc']) }}">Giá
                            Từ Cao Cao Đến Thấp</a></li>




                    <li><a class="dropdown-item"
                            href="{{ request()->fullUrlWithQuery(['order_by' => 'id', 'sort' => 'asc']) }}">Mới tới
                            cũ</a></li>


                    <li><a class="dropdown-item"
                            href="{{ request()->fullUrlWithQuery(['order_by' => 'id', 'sort' => 'desc']) }}">Cũ Tới
                            Mới</a></li>










                    {{-- <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['item' => 'desc']) }}">Sản Phẩm Từ
                            Mới Đến Cũ</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['item' => 'asc']) }}">Sản Phẩm Từ
                            Cũ Tới Mới</a>
                    </li> --}}


                    {{-- <li><a class="dropdown-item" href="{{ request()->fullUrl }}?item=desc">Sản Phẩm Từ
                            Cũ Tới Mới</a>
                    </li>

                    <li><a class="dropdown-item" href="{{ request()->fullUrl }}?item=asc">Sản Phẩm Từ
                            Mới Tới Cũ</a>
                    </li> --}}
                </ul>
            </div>




        </div>






    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>

                <th scope="col">Danh mục </th>

                <th scope="col">Ảnh Đại Diện</th>
                <th scope="col">Giá</th>
                <th scope="col">Trạng Thái</th>


                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $product)
                <tr id="row-{{ $product->id }}">

                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>


                    <td>{{ $product->category->name }}</td>
                    <td>
                        <img class="" style="width: 200px" src="{{ $product->feature_image }}" alt="">

                    </td>
                    <td>{{ $product->price }}</td>

                    <td>
                        {!! \App\Helpers\admin_helper::user_active($product->active) !!}


                    </td>
                    <td>
                        <button type="button" class="btn btn-info"><a class="text-light"
                                href="/admin/product/edit/{{ $product->id }}">Sửa</a></button>



                        <button type="button" class="btn btn-danger">
                            <a href="#"
                                onclick="removeRow({{ $product->id }},'/admin/product/delete/')">Xóa</a></button>




                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

    <div class="d-flex  justify-content-center"> {{ $products->links() }}</div>
@endsection


@section('footer')
@endsection
