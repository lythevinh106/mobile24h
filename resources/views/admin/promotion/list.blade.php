@extends('admin.main');


@section('content')
    <div class=""><a href="{{ route('admin.promotion.create') }}" class="btn btn-primary text-white fw-bold">Thêm<i
                class=" fa-solid fa-plus"></i> </a>
    </div>


    <div class="mt-3"><a href="{{ route('admin.promotion.sync') }}" class="btn btn-primary text-white fw-bold ">Bấm
            vào
            đây để đồng bộ các chương trình khuyến mãi </a>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">Name</th>
                <th scope="col">Tiêu Đề</th>

                <th scope="col">Trạng Thái</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($promotions as $promotion)
                <tr id="row-{{ $promotion->id }}">
                    <td>{{ $promotion->id }}</td>
                    <td>{{ $promotion->name }}</td>
                    <td>{{ $promotion->title }}</td>
                    <td>
                        {!! \App\Helpers\admin_helper::user_active($promotion->active) !!}


                    </td>
                    <td>
                        <button type="button" class="btn btn-info"><a class="text-light"
                                href="/admin/promotion/edit/{{ $promotion->id }}">Sửa</a></button>



                        <button type="button" class="btn btn-danger">
                            <a href="#"
                                onclick="removeRow({{ $promotion->id }},'/admin/promotion/delete/')">Xóa</a></button>




                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection


@section('footer')
@endsection
