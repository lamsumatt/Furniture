@extends('admincp.dashboard')

@section('content')
    @include('admincp.side')

    <div class="container" style="border: none">
        <div class="row justify-content-center">
            <div class="row-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê bài viết</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-triped">
                            <thead>
                                <tr>
                                    <th scope="row">#</th>
                                    <th scope="row">Tên bài viết</th>
                                    <th scope="row">Hình ảnh</th>
                                    <th scope="row">Tóm tắt</th>
                                    <th scope="row">Nội dung bài viết</th>
                                    <th scope="row">Ngày đăng</th>
                                    <th scope="row">Kích hoạt</th>
                                    <th scope="row">Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_blogs as $key => $list)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ $list->name_blog }}</td>
                                        <td><img src="{{ asset('uploads/blog_img/' . $list->image) }}"
                                                width="200px" height="auto"></td>
                                        <td>{{ $list->summary_content }}</td>
                                        <td>{{ $list->summary }}</td>
                                        <td>{{ $list->day_update }}</td>
                                        <td>
                                            @if ($list->activated == 0)
                                                <span class="text text-success">Kích hoạt</span>
                                            @else
                                                <span class="text text-success">Không kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('blog-admin.edit', [ $list->id]) }}"
                                                class="btn btn-primary">edit</a>
                                            <form action="{{ route('blog-admin.destroy', [$list->id]) }}"
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
