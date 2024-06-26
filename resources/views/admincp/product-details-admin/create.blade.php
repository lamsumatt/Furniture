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

                        <form method="POST" action="{{ route('product-details-admin.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="prDetails_name" onkeyup="ChangeToSlug();"
                                    value="{{ old('prDetails_name') }}" class="form-control" id="slug"
                                    aria-describedby="emailHelp" placeholder="Tên ...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                              <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Chiết khấu</label>
                              <input type="text" name="discount" value="{{ old('discount') }}" class="form-control" id="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Số lượng</label>
                              <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" id="">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tóm tắt sản phẩm</label>
                                <textarea class="form-control" rows="5" name="summary" id="summary" style="resize: none"></textarea>

                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                                <textarea class="form-control" rows="5" name="summary_content" id="summary_content" style="resize: none"></textarea>

                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                <select name="product_admin" class="custom-select">
                                    @foreach ($product_admin as $key => $detail)
                                        <option value="{{ $detail->id }}">{{ $detail->product_name }}</option>\
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                <input type="file" name="images" class="form-control-file" placeholder="hình ảnh...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select name="activated" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>

                            <button type="submit" name="themsanpham" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
<script>
    ClassicEditor
    .create( document.querySelector( '#summary' ) );\
    .catch( error => {
        console.error( error );
    })
</script>
@endsection
