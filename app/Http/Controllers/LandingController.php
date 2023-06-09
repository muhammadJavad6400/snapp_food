<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function loadPage($page)
    {
        //Check if there is a method or not
        if(method_exists($this , $page)){
            return $this->$page();
        }else{
            abort(404);
        }    
    }

    public function products()
    {
        $products = Product::query();
        if ($p = request('p')) {
            $products = $products->where('title', 'like', "%$p%");
        }
        if($o = request('o')) {
            if($o == 1) {
                $products = $products->orderBy('created_at' , 'ASC');
            }
            if($o == 2) {
                $products = $products->orderBy('created_at' , 'DESC');
            }
            if($o == 3) {
                $products = $products->orderBy('price' , 'ASC');
            }
            if($o == 4) {
                $products = $products->orderBy('price' , 'DESC');
            }
        }

        $products = $products->paginate(9);
       return view('landing.products' , compact('products'));
    }

    public function shops()
    {
        $shops = Shop::first()->paginate(5);
       return view('landing.shops' , compact('shops'));
    }

    public function cart()
    {
        $user_id = auth()->id();
        $cart = Cart::where('user_id' , $user_id)->where('finished' , 0)->first();
        return view('landing.cart' , compact('cart'));
    }

    public function showShop(Shop $shop)
    {
        $products = Product::where('shop_id' , $shop->id)->paginate(9);
        return view('landing.shop' , compact('shop' , 'products'));
        
    }

    public function showOneShop(Shop $shop)
    {
        $products = Product::where('shop_id' , $shop->id)->paginate(9);
        return view('landing.shop' , compact('shop' , 'products'));
    
    }

    public function showProduct(Product $product)
    {
        return view('landing.product' , compact('product'));
    }
}
