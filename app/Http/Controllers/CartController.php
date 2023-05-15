<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        // The Current User Is Logged In
        $currentLoggedInUser = auth()->user();

        if($currentLoggedInUser) {
            // // Do We Have a Shopping Cart For This User or Not?
            // $cart = Cart::where('user_id' , $currentLoggedInUser->id)->first();
            // // If We Don't Have a Shopping Cart, Create One 
            // if(!$cart) {

            //     $cart = Cart::create(['user_id' => $currentLoggedInUser->id]);
            // } 
            $cart = Cart::firstOrCreate(['user_id' => $currentLoggedInUser->id]);
            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'count' => 1,
                'payable' => $product->price2
            ]);
            return back()->withMessage('محصول مورد نظر به سبد خرید اضافه شد');
            
        }else{
            return back()->withError('لطفا ابتدا وارد حساب کاربری خود شوید');
        }
        
    }
}
