<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\Api;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Auth::user()->products;
        return view('vendor.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = Auth::user();
        $product =  Product::create([
            'vendor_id' => $vendor->id,
            'handle' => $request->name,
            'thumbnail' =>ImageHelper::saveResizedImage($request->images[0],'images/product',350,400)
        ] + $request->all());
        foreach ($request->images as $image) {
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $image
            ]);
        }
        toastr()->info('product was created successfully', 'Done');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'handle' => $request->name
        ] + $request->all());
        toastr()->info('your product was updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toastr()->info('Your Product was removed');
        return redirect()->back();
    }

    public function fetchSubCat(Request $request)
    {
        $category = Category::find($request->id);
        $subcategories = $category->subcategories;
        return response()->json($subcategories);
    }

    public function images($id)
    {
        $product = Product::find($id);
        return view('vendor.product.productImage')->with('product', $product);
    }
}
