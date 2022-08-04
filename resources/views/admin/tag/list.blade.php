@extends('admin.main');


@section('content')
    <div class=""><a href="{{ route('admin.tag.create') }}" class="btn btn-primary text-white fw-bold">Thêm<i
                class=" fa-solid fa-plus"></i> </a>
    </div>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>



                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr id="row-{{ $tag->id }}">
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>

                    <td>
                        <button type="button" class="btn btn-info"><a class="text-light"
                                href="/admin/tag/edit/{{ $tag->id }}">Sửa</a></button>



                        <button type="button" class="btn btn-danger">
                            <a href="#" onclick="removeRow({{ $tag->id }},'/admin/tag/delete/')">Xóa</a></button>




                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('footer')
@endsection
