@extends('admin.main');


@section('content')
    <div class=""><a href="{{ route('admin.post_category.create') }}" class="btn btn-primary text-white fw-bold">Thêm<i
                class=" fa-solid fa-plus"></i> </a>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>


                <th scope="col">Trạng Thái</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>

            {!! \App\Helpers\admin_helper::recursive_menu($post_categories, 0, '', 'post_category') !!}


        </tbody>
    </table>
@endsection


@section('footer')
    <script src="{{ asset('admin/js/main.js') }}"></script>
@endsection
