@extends('admincp.dashboard')
@section('content')
@include('admincp.side')
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê pro</div>

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
                                    <th scope="col">Loại sản phẩm</th>
                                    <th scope="col">Danh sách loại</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Kích hoạt</th>
                                    <th scope="col">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $key => $pro)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $pro->product_name }}</td>
                                        {{-- <td>{{ $pro->slug_product }}</td> --}}
                                        <td>{{ $pro->product_description }}</td>
                                        {{-- <td>{{ $pro->comic->tentruyen }}</td> --}}
                                        <td>
                                            @if ($pro->activated == 0)
                                                <span class="text text-success">Kích hoạt</span>
                                            @else
                                                <span class="text text-success">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('product-admin.edit', [$pro->id]) }}"
                                                class="btn btn-primary">edit</a>
                                            <form action="{{ route('product-admin.destroy', [$pro->id]) }}" method="POST">
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
