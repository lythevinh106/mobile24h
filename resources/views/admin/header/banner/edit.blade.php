@extends('admin.main')
@section('content')
    @if ($check_row == 1)
        <form method="POST" action="{{ route('admin.header.update_banner') }}">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>



                        <th scope="col">Ảnh Đại Diện</th>



                        <th scope="col">Hành Động</th>

                        <th scope="col"> <label for="" class="form-label">Kích Hoạt</label></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($banners as $banner)
                        <tr id="row-{{ $banner->id }}">

                            <th scope="row">{{ $banner->id }}</th>
                            <td>{{ $banner->name }}</td>



                            <td>
                                <img class="" style="width: 200px" src="{{ $banner->feature_image }}"
                                    alt="">

                            </td>

                            <td>




                                <button type="button" {{ $banner->active == 1 ? 'hidden' : '' }} class="btn btn-danger">
                                    <a href="#"
                                        onclick="removeRow({{ $banner->id }},'/admin/header/delete_banner/')">Xóa</a></button>




                            </td>
                            <td class="">
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="radio" name="active"
                                        value="{{ $banner->id }}" {{ $banner->active == 1 ? 'checked' : '' }}
                                        id="flexRadioDefault1">

                                </div>
                            </td>

                        </tr>
                    @endforeach





                    @csrf


                </tbody>
            </table>

            <div class="col-md-12 text-center">


                <button type="submit" class="mx-auto btn btn-primary mt-2">Lưu Cài Đặt Banner</button>

            </div>
        @else
            <div class="col-md-12 text-center">

                <a href="{{ route('admin.header.create_banner') }}">
                    <button class="mx-auto btn btn-primary mt-2">Thêm
                        Banner</button>
                </a>
            </div>


        </form>
    @endif
@endsection

{{-- @section('footer')
    <script type="text/javascript"></script>
@endsection --}}
