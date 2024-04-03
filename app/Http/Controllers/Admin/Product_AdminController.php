<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product_Admin;
use Illuminate\Http\Request;

class Product_AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product_Admin::orderBy('id', 'desc')->get();
        return view('admincp.product-admin.index')->with(compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admincp.product-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'product_name' => 'required|unique:product|max:255',
                'slug_product' => 'required|unique:product|max:255',
                'product_description' => 'required|max:255',
                'activated' => 'required',
            ],
            [
                'product_name.unique' => 'Tên danh mục đã có, điền tên khác',
                'product_name.required' => 'không được để trống tên danh mục',
                'slug_product.unique' => 'không được để trống tên slug danh mục',
                'product_description.required' => 'không được để trống mô tả danh mục',
            ]
        );

        $product = new Product_Admin();
        $product->product_name = $data['product_name'];
        $product->slug_product = $data['slug_product'];
        $product->product_description = $data['product_description'];
        $product->activated = $data['activated'];
        $product->save();
        return redirect()->back()->with('status', 'Thêm sản phẩm thành công');
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
        $product = Product_Admin::find($id);
        return view('admincp.product-admin.edit')->with(compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'product_name' => 'required|unique:product|max:255',
                'slug_product' => 'required|unique:product|max:255',
                'product_description' => 'required|max:255',
                'activated' => 'required',
            ],
            [
                'product_name.required' => 'không được để trống tên danh mục',
                'slug_product.required' => 'không được để trống tên slug danh mục',
                'product_description.required' => 'không được để trống mô tả danh mục',
            ]
        );

        $product = Product_Admin::find($id);
        $product->product_name = $data['product_name'];
        $product->slug_product = $data['slug_product'];
        $product->product_description = $data['product_description'];
        $product->activated = $data['activated'];
        $product->save();
        return redirect()->back()->with('status', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product_Admin::find($id);
        $product->delete();
        return redirect()->back()->with('status', 'Xoá sản phẩm thành công');
    }
}
