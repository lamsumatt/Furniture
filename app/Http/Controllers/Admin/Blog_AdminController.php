<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Blog_Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Blog_AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_blogs = Blog_Admin::orderBy('id', 'desc')->get();
        $blogs = Blog_Admin::all();
        // dd($blogs);
        return view('admincp.blog-admin.index')->with(compact('list_blogs', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admincp.blog-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name_blog' => 'required|max:255',
                'name_admin' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'summary' => 'required',
                'summary_content' => 'required',
                'day_update' => 'required',
                'activated' => 'required',
            ],
            [
                'name_blog.unique' => 'Tên blog đã có, điền tên khác',
                'name_blog.required' => 'không được để trống tên blog',
                'name_admin.unique' => 'không được để trống tên người đăng blog',
                'image.required' => 'không được để trống hình ảnh',
                // 'summary.required' => 'không được để trống nội dung blog',
                'summary_content.required' => 'không được để trống tóm tắt blog',
                'date_update.required' => 'không được để trống ngày đăng',
            ]
        );
        $blogs = new Blog_Admin();
        $blogs->name_blog = $data['name_blog'];
        $blogs->name_admin = $data['name_admin'];
        $blogs->summary = $data['summary'];
        $blogs->summary_content = $data['summary_content'];
        $blogs->day_update = $data['day_update'];
        $blogs->activated = $data['activated'];

        // add image into folder\
        $get_image = $request->image;
        $path = 'uploads/blog_img/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $blogs->image = $new_image;
        // enctype="multipart/form-data";
        $blogs->save();
        return redirect()->back()->with('status', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blogs = Blog_Admin::find($id);
        return view('admincp.blog-admin.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name_blog' => 'required|max:255',
                'name_admin' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'summary' => 'required',
                'summary_content' => 'required',
                // 'day_update' => 'required',
                'activated' => 'required',
            ]
        //     [
        //         'name_blog.required' => 'không được để trống tên blog',
        //         'name_admin.required' => 'không được để trống slug blog',
        //         'image.required' => 'không được để trống hình ảnh',   
        // ]
    );
            $blogs = Blog_Admin::find($id);
            $blogs->name_blog = $data['name_blog'];
            $blogs->name_admin = $data['name_admin'];
            $blogs->image = $data['image'];
            $blogs->summary = $data['summary'];
            $blogs->summary_content = $data['summary_content'];
            // $blogs->day_update = $data['day_update'];
            $blogs->activated = $data['activated'];
            $blogs->save();
            return redirect()->back()->with('status', 'Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogs = Blog_Admin::find($id);
        $blogs->delete();
        return redirect()->back()->with('status', 'Đã xóa thành công');
    }
}
