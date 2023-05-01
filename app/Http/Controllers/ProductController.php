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
        if (auth()->user()->role == 'admin') {
            $products = Product::all();
        }else
        {
            $products = Product::where('shop_id' , currentShopId())->get();
        }
        
        return view('product.index' ,  compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = Shop::all();
        return view('product.create' , compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //validation Request
        $product_validation = $request->validated();

        

        //Image
        if(isset($product_validation['image']) && $product_validation['image']){

            $product_validation['iamge'] = upload($product_validation['image']);
        }

        //ِDiscount Default
        if(!($product_validation['discount'])){
            $product_validation['discount'] = 0;
        }
        //Access to All shop
        if(auth()->user()->role == 'admin'){
            $product_validation['shop_id'] = $request->shop_id;
        }else{
        //shop id
        $product_validation['shop_id'] = currentShopId();
        }
        
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
        $shops = Shop::all();
        return view('product.edit' ,  compact('product' , 'shops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //validation Request
        $product_validation = $request->validated();


        //Image
        if(isset($product_validation['image']) && $product_validation['image']){

            $product_validation['iamge'] = upload($product_validation['image']);
        }
        //change shop name in the Edit page
        if(auth()->user()->role == 'admin'){
            $product_validation['shop_id'] = $request->shop_id;
        }
        //dd($product_validation);
        //update product
        $product->update($product_validation);

        //redirect
        return redirect()->route('product.index')->withMessage(__('SUCCESS'));

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
