@extends('admin.main');


@section('content')
    <div class=""><a href="{{ route('admin.user.create') }}" class="btn btn-primary text-white fw-bold">Thêm<i
                class=" fa-solid fa-plus"></i> </a>
    </div>
    <div class="d-flex justify-content-between mt-2">
        <!-- Navbar Search-->
        <div class="w-30">
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

                <th scope="col">Email</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($list_users as $user)
                <tr id="row-{{ $user->id }}">
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>
                    <td>
                        {!! \App\Helpers\admin_helper::user_active($user->active) !!}


                    </td>
                    <td>
                        <button type="button" class="btn btn-info"><a class="text-light"
                                href="/admin/user/edit/{{ $user->id }}">Sửa</a></button>


                        @if (Auth::guard('admin')->user()->id != $user->id)
                            <button type="button" class="btn btn-danger">
                                <a href="#"
                                    onclick="removeRow({{ $user->id }},'/admin/user/delete/')">Xóa</a></button>
                        @endif



                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>


    <div class="d-flex  justify-content-center"> {{ $list_users->links() }}</div>
@endsection


@section('footer')
    <script src="{{ asset('admin/js/main.js') }}"></script>
@endsection
