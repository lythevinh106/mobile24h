@extends('admin.main');
@section('content')
    <div class="text-end"><a href="{{ route('admin.category.list') }}" class="btn btn-primary text-white fw-bold">Danh Sách
        </a>
    </div>
    <form method="post" action="/admin/category/update/{{ $category->id }}">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Danh Mục</label>
            <input value="{{ $category->name }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">


            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Chọn Danh Mục Cha</label>
            <select class="form-select" name="parent_id" aria-label="Default select example">
                <option value="0">Danh Mục Cha</option>
                @foreach ($parents as $parent)
                    <option {{ $parent->id == $category->id ? 'disabled' : '' }}
                        {{ $parent->id == $category->parent_id ? 'selected' : '' }} value="{{ $parent->id }}">
                        {{ $parent->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="" class="form-label">Kích Hoạt </label>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" value="1"
                {{ $category->active == 1 ? 'checked' : '' }} id="flexRadioDefault1">
            <label class="form-check-label" for="">
                Có
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" {{ $category->active == 0 ? 'checked' : '' }} type="radio" name="active"
                value="0" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                không
            </label>
        </div>
        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Sửa</button></div>
    </form>
@endsection
