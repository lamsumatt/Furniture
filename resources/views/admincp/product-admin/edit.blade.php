@extends('admincp.dashboard')
@section('content')
@include('admincp.side')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm sản phẩm</div>
                {{-- thông báo lỗi  --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('product-admin.update', [$product_admin->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                            <input type="text" name="product_name" onkeyup="ChangeToSlug();"
                                value="{{ old('product_name') }}" class="form-control" id="slug"
                                aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh sách loại sản phẩm</label>
                            <input type="text" name="slug_product" value="{{ old('slug_product') }}"
                                class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả loại sản phẩm</label>
                            <input type="text" name="product_description" value="" class="form-control"
                                id="slug" aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích hoạt</label>
                            <select name="kichhoat" class="custom-select">
                                @if ($product_admin->activated == 1)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                            <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
