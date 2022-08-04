@extends('admin.main');
@section('content')
    <div class="text-end"><a href="{{ route('admin.tag.list') }}" class="btn btn-primary text-white fw-bold">Danh Sách
        </a>
    </div>
    <form method="post" action="/admin/tag/update/{{ $tag->id }}">


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Tag</label>
            <input value="{{ $tag->name }}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">


            @error('name')
                <div class="bg-danger  px-3 mt-2 text-warning">{{ $message }}</div>
            @enderror
        </div>


        @csrf
        <div class="col-md-12 text-center"><button type="submit" class="mx-auto btn btn-primary mt-2">Sửa</button></div>
    </form>
@endsection
