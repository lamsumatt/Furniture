<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Product_details;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product_Admin;
use Illuminate\Http\Request;

class Product_detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_product = Product_details::with('Product_admin')->orderBy('id', 'desc')->get();
        return view('admincp.product-details-admin.index')->with(compact('list_product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_admin = Product_Admin::orderBy('id', 'desc')->get();
        return view('admincp.product-details-admin.create')->with(compact('product_admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'prDetails_name' => 'required|unique:product_details|max:255',
                'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'summary' => 'required',
                'summary_content' => 'required',
                'activated' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'discount' => 'required',
                'product_admin' => 'required',
            ],
            [
                'prDetails_name.unique' => 'Tên sản phẩm đã có, điền tên khác',
                'prDetails_name.required' => 'không được để trống tên sản phẩm',
                'images.required' => 'không được để trống hình ảnh',
                'price.required' => 'không để trống giá sản phẩm',
                'summary.required' => 'không được để trống tóm tắt sản phẩm',
                'summary_content.required' => 'không được để trônhs nội dung sản phẩm',
            ]
        );
        $details = new Product_details();
        $details->prDetails_name = $data['prDetails_name'];
        $details->summary = $data['summary'];
        $details->summary_content = $data['summary_content'];
        $details->price = $data['price'];
        $details->activated = $data['activated'];
        $details->product_id = $data['product_admin'];
        $details->quantity = $data['quantity'];
        $details->discount = $data['discount'];

        // add image into folder\
        $get_image = $request->images;
        $path = 'uploads/product_img/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $details->images = $new_image;
        // enctype="multipart/form-data";
        $details->save();
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
        $details = Product_details::find($id);
        $product_admin = Product_Admin::orderBy('id', 'desc')->get();
        return view('admincp.product-details-admin.edit')->with(compact('details', 'product_admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
        [
            'prDetails_name' => 'required|max:255',
            'summary' => 'required',
            'activated' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
            // Thêm quy tắc xác thực cho product_admin
            'product_admin' => 'required',
    ], [
            'prDetails_name.required' => 'không được để trống tên sản phẩm',
    ]);
        $details = Product_details::find($id);
        $details->prDetails_name = $data['prDetails_name'];
        $details->summary = $data['summary'];
        $details->summary_content = $data['summary_content'];
        $details->price = $data['price'];
        $details->activated = $data['activated'];
        $details->product_id = $data['product_admin'];
        $details->quantity = $data['quantity'];
        $details->discount = $data['discount'];
        $details->save();
        return redirect()->back()->with('status', 'Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $details = Product_details::find($id);
        $details->delete();
        return redirect()->back()->with('status', 'Đã xóa thành công');
    }
}
