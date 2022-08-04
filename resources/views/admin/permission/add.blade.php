@extends('admin.main')

@section('content')
    {{-- @inject('carbon', '') --}}
    <form method="POST" action="{{ route('admin.permission.store') }}">
        <div class="mb-3">
            <select name="module_parent" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                @foreach (config('permission.table_module') as $item)
                    <option {{ \App\Models\Permission::where('name', $item)->first() ? 'disabled' : '' }}
                        value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>

        </div>
        @csrf

        <div class="form-group">
            <div class="row">

                @foreach (config('permission.module_children') as $item)
                    <div class="col-md-3">
                        <label for="">
                            <input checked type="checkbox" value="{{ $item }}" name="module_children[]">
                            {{ $item }}
                        </label>
                    </div>
                @endforeach






            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
