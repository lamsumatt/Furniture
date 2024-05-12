@extends('admincp.dashboard')
@section('content')
    @include('admincp.side')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm bài viết</div>
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

                        <form method="POST" action="{{ route('blog-admin.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input type="text" name="name_blog" onkeyup="ChangeToSlug();"
                                    value="{{ old('name_blog') }}" class="form-control" id="slug"
                                    aria-describedby="emailHelp" placeholder="Tên ...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tên người đăng</label>
                                <input type="text" name="name_admin" onkeyup="ChangeToSlug();"
                                    value="{{ old('name_admin') }}" class="form-control" id="slug"
                                    aria-describedby="emailHelp" placeholder="Tên ...">
                            </div>
                                
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tóm tắt bài viết</label>
                                <textarea class="form-control" rows="5" name="summary_content" id="summary" style="resize: none"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Nội dung bài viết</label>
                                <textarea class="form-control" rows="5" name="summary" id="summary" ></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                <input type="file" name="image" class="form-control-file" placeholder="hình ảnh...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Ngày đăng</label>
                                <input type="date" name="day_update" class="form-control-file" placeholder="ngày đăng...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select name="activated" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>

                            <button type="submit" name="thembaiviet" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEditor.create( document.querySelector( '#editor' ) );
    </script>
@endsection
