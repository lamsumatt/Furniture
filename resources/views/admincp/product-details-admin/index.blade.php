@extends('admincp.dashboard')

@section('content')
    @include('admincp.side')

    <div class="container" style="border: none">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê truyện</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-triped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Tóm tắt</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Kích hoạt</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_product as $key => $list)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $list->prDetails_name }}</td>
                                        <td><img src="{{ asset('uploads/product_img/' . $list->images) }}"
                                                width="200px" height="auto"></td>
                                        <td>{{ $list->price }}</td>
                                        <td>{{ $list->summary }}</td>
                                        <td>{{ $list->product_admin->product_name }}</td>
                                        <td>
                                            @if ($list->activated == 0)
                                                <span class="text text-success">Kích hoạt</span>
                                            @else
                                                <span class="text text-success">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('product-details-admin.edit', [ $list->id]) }}"
                                                class="btn btn-primary">edit</a>
                                            <form action="{{ route('product-details-admin.destroy', [$list->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn có chắc muốn xóa ?')"
                                                    class="btn btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
