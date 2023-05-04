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
    
    public function index(Request $request)
    {
        $shops = Shop::all();
        $products = Product::query();

        //Search for Shop name
        if(auth()->user()->role == 'admin'){
            if ($request->s){
                $products = $products->where('shop_id' , $request->s);
            }
        }else{
            $products = $products->where('shop_id' , currentShopId());
        }

        //Search for Product name
        if($request->t){
            $products = $products->where('title' , 'like' , "%$request->t%");
        }

        //Search and Show Delete Product
        if($request->d){
            $products = $products->withTrashed();
        }

        //Ordering
        if($order = $request->o){
            if($order == 1){
                $products = $products->orderBy('price' , 'ASC');
            }
            if($order == 2){
                $products = $products->orderBy('price' , 'DESC');
            }
            if($order == 3){
                $products = $products->orderBy('created_at' , 'DESC');
            }
            if($order == 4){
                $products = $products->orderBy('created_at' , 'ASC');
            }
        }


        $products = $products->get();
        return view('product.index' ,  compact('products' , 'shops'));
    }

    public function create()
    {
        $shops = Shop::all();
        return view('product.create' , compact('shops'));
    }

    
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

    
    public function show(Product $product)
    {
        //
    }

    
    public function edit(Product $product ,Request $request)
    {
         //Access to All shop
         if(auth()->user()->role == 'admin'){
            //َAccess to All products
            $product_validation['shop_id'] = $request->shop_id;
        }else{
            // Access and Edit own products
            checkPolicy('product' , $product);
        };

        //checkPolicy('product' , $product);
        $shops = Shop::all();
        return view('product.edit' ,  compact('product' , 'shops'));
    }

    
    public function update(ProductRequest $request, Product $product)
    {
          //Access to All shop
          if(auth()->user()->role == 'admin'){
            //َAccess to All products
            $product_validation['shop_id'] = $request->shop_id;
        }else{
            // Access and Edit own products
            checkPolicy('product' , $product);
        };

        //validation Request
        $product_validation = $request->validated();


        //Image
        if(isset($product_validation['image']) && $product_validation['image']){

            $product_validation['iamge'] = upload($product_validation['image']);
        }
        //change shop name in the Edit page
        // if(auth()->user()->role == 'admin'){
        //     $product_validation['shop_id'] = $request->shop_id;
        // }
        //dd($product_validation);
        //update product
        $product->update($product_validation);

        //redirect
        return redirect()->route('product.index')->withMessage(__('SUCCESS'));

    }

    public function restore($product , $id , $request)
    {
        //Access to All shop
        if(auth()->user()->role == 'admin'){
            //َAccess to All products
            $product_validation['shop_id'] = $request->shop_id;
        }else{
            // Access and Delete own products
            checkPolicy('product' , $product);
        };

        $product = Product::withTrashed()->where('id' , $id)->firstOrFail();
        $product->restore();
        dd($product);
        //redirect
        return redirect()->route('product.index')->withMessage(__('SUCCESS'));      
    }

    public function destroy(Product $product , Request $request)
    {
        //Access to All shop
        if(auth()->user()->role == 'admin'){
            //َAccess to All products
            $product_validation['shop_id'] = $request->shop_id;
        }else{
            // Access and Delete own products
            checkPolicy('product' , $product);
        };
        $product->delete();
        //redirect
        return redirect()->route('product.index')->withMessage(__('DELETED'));
    }
}
