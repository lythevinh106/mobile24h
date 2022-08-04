@extends('admin.main');


@section('content')
    <div class=""><a href="{{ route('admin.role.create') }}" class="btn btn-primary text-white fw-bold">Thêm<i
                class=" fa-solid fa-plus"></i> </a>
    </div>
    <div class="d-flex justify-content-between  mt-2">
        <!-- Navbar Search-->







    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>

                <th scope="col">Mô Tả</th>


                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>


            @php
                $dem = 0;
            @endphp
            @foreach ($roles as $role)
                <tr id="row-{{ $role->id }}">

                    @php
                        $dem++;
                    @endphp
                    <th scope="row">{{ $dem }}</th>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>




                    <td>
                        <button type="button" class="btn btn-info"><a class="text-light"
                                href="/admin/role/edit/{{ $role->id }}">Sửa</a></button>



                        <button {{ $role->name == 'Admin' ? 'hidden' : '' }} type="button" class="btn btn-danger">
                            <a href="#" onclick="removeRow({{ $role->id }},'/admin/role/delete/')">
                                Xóa</a></button>




                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>

    {{-- <div class="d-flex  justify-content-center"> {{ $roles->links() }}</div> --}}
@endsection


@section('footer')
@endsection
