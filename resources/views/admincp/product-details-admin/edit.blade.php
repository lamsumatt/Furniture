@extends('admincp.dashboard')
@section('content')
    @include('admincp.side')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật sản phẩm</div>
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

                        <form method="POST" action="{{ route('product-details-admin.update', [$details->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="prDetails_name" onkeyup="ChangeToSlug();"
                                    value="{{ $details->prDetails_name }}" class="form-control" id="slug"
                                    aria-describedby="emailHelp" placeholder="Tên sản phẩm...">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                              <input type="text" name="price" value="{{ $details->price }}" class="form-control" id="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Chiết khấu</label>
                              <input type="text" name="discount" value="{{ $details->discount }}" class="form-control" id="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Số lượng</label>
                              <input type="text" name="quantity" value="{{ $details->quantity }}" class="form-control" id="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tóm tắt sản phẩm</label>
                                <textarea class="form-control" rows="5" name="summary" id="summary" style="resize: none">{{ $details->summary }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                                <textarea class="form-control" rows="5" name="summary_content" id="summary_content" style="resize: none">{{ $details->summary_content }}</textarea>

                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                <select name="danhmuc" class="custom-select">
                                    @foreach ($product_admin as $key => $product)
                                        <option {{ $product->id == $details->product_id ? 'selected' : '' }}
                                            value="{{ $product->id }}">{{ $product->product_name }}</option>\
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="images" class="form-control-file" placeholder="hình ảnh...">
                                <img src="{{ asset('uploads/product_img/' . $details->images) }}" width="200px"
                                    height="auto">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select name="activated" class="custom-select">
                                    @if ($details->activated == 1)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Không kích hoạt</option>
                                    @else
                                        <option value="0">Kích hoạt</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                            </div>

                            <button type="submit" name="themsanpham" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
