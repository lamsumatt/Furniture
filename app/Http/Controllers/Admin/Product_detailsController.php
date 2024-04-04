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
        $list_images = Product_details::with('Product')->orderBy('id', 'desc')->get();
        return view('admincp.product-details-admin.index')->with(compact('list_images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'prDetails_name' => 'required|unique:truyen|max:255',
                'slug_prDetails' => 'required|unique:truyen|max:255',
                'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width=100,min_height=100,
                                    max_width=1000,max_height=1000',
                'summary' => 'required',
                'activated' => 'required',
                'product' => 'required',
            ],
            [
                'prDetails_name.unique' => 'Tên truyện đã có, điền tên khác',
                'prDetails_name.required' => 'không được để trống tên truyện',
                'slug_prDetails.unique' => 'không được để trống slug truyện',
                'images.required' => 'không được để trống hình ảnh',
                'summary.required' => 'không được để trống tóm tắt truyện',
            ]
        );
        $details = new Product_details();
        $details->prDetails_name = $data['prDetails_name'];
        $details->slug_prDetails = $data['slug_prDetails'];
        $details->summary = $data['summary'];
        $details->activated = $data['activated'];
        $details->product_id = $data['product'];

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
        $product = Product_Admin::orderBy('id', 'desc')->get();
        return view('admincp.product-details-admin.edit')->with(compact('details', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
