@extends('admincp.dashboard')
@section('content')
    @include('admincp.side')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật bài viết</div>
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

                        <form method="POST" action="{{ route('blog-admin.update', [$blogs->id]) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input type="text" name="name_blog" onkeyup="ChangeToSlug();"
                                    value="{{ $blogs->name_blog }}" class="form-control" id="slug"
                                    aria-describedby="emailHelp" placeholder="Tên bài viết...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Người đăng bài</label>
                                <input type="text" name="name_admin" value="{{ $blogs->name_admin }}"
                                    class="form-control"  aria-describedby="emailHelp"
                                    placeholder="Người đăng bài...">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Tóm tắt bài viết</label>
                                <textarea class="form-control" rows="5" name="summary_content" id="summary" style="resize: none">{{ $blogs->summary_content }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Nội dung bài viết</label>
                                <textarea class="form-control" rows="5" name="summary" id="summary">{{ $blogs->summary }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                <input type="file" name="image" class="form-control-file" placeholder="hình ảnh...">
                                <img src="{{ asset('uploads/blog_img/' . $blogs->image) }}" width="200px"
                                    height="auto">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select name="activated" class="custom-select">
                                    @if ($blogs->activated == 1)
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
