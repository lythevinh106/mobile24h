@extends('admin.main')

@section('content')
    {{-- @inject('carbon', '') --}}
    <div class="container">
        <div class=""><a href="{{ route('admin.role.list') }}" class="btn btn-primary text-white fw-bold">Danh Sách
            </a>
        </div>
        <form action="{{ route('admin.role.update', $role->id) }}" enctype="multipart/form-data" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Tên quyền</label>
                            <input type="text" value="{{ $role->name }}" class="form-control" name="name"
                                placeholder="Nhập tên quyền">
                        </div>
                    </div>

                    @error('name')
                        <div class="bg-danger px-3 mt-2
                    text-warning">{{ $message }}
                        </div>
                    @enderror
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">mô tả quyền</label>
                            <input type="text" value="{{ $role->description }}" class="form-control" name="description"
                                placeholder="Nhập tên quyền">
                        </div>
                    </div>
                    @error('description')
                        <div class="bg-danger px-3 mt-2
                text-warning">{{ $message }}
                        </div>
                    @enderror





                </div>
                <h4 class=" mt-5 card-title text-primary">
                    <label>
                        <input type="checkbox" onclick="check_all_input(this)" id="check_all">
                    </label>
                    chọn tất cả
                </h4>
                <div id="box-module" class="row">
                    @foreach ($permission_parents as $permission_parent)
                        @if ($permission_parent->name != 'other' && $permission_parent->name != 'permission')
                            <div class="card border-primary mb-3 col-md-12 mt-3 ">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" id="check_all" onclick="check_all_children(this)"
                                            value="">
                                    </label>
                                    <span class="text-info h6"> Module {{ $permission_parent->name }}</span>
                                </div>



                                <div class="row">
                                    @foreach ($permission_parent->permission_children as $permission_children)
                                        <div class="card-body text-primary col-md-3">

                                            <h5 class="card-title">
                                                <label>
                                                    <input
                                                        {{ $role->permissions->contains('id', $permission_children->id) == true ? 'checked' : '' }}
                                                        name="permission_id[]" type="checkbox" class="children_check_box"
                                                        value="{{ $permission_children->id }}">
                                                </label>
                                                {{ $permission_children->name }}
                                            </h5>

                                        </div>
                                    @endforeach


                                </div>





                            </div>
                        @else
                            <div class="card border-primary mb-3 col-md-12 mt-3 ">
                                <div class="card-header">
                                    <label>
                                        <input
                                            {{ $role->permissions->contains('id', $permission_parent->id) == true ? 'checked' : '' }}
                                            name="permission_id[]" type="checkbox" id="" onclick=""
                                            value="{{ $permission_parent->id }}">
                                    </label>
                                    <span class="text-info h6"> Module {{ $permission_parent->description }}</span>
                                </div>









                            </div>
                        @endif
                    @endforeach












                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập Nhật Quyền</button>
                </div>
                @csrf
        </form>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('admin/js/role.js') }}"></script>
@endsection
