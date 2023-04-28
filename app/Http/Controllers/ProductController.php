<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Shop;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' ,'seller']);
        
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index' ,  compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //validation Request
        $product_validation = $request->validated();

        //shop id
        $shop = Shop::where('user_id' , auth()->id())->firstOrfail();
        $product_validation['shop_id'] = $shop->id;
        
        //create Product
        Product::create($product_validation);

        //redirect
        return redirect()->route('product.index')->withMessage(__('SUCCESS'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit' ,  compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        //redirect
        return redirect()->route('product.index')->withMessage(__('DELETED'));
    }
}
