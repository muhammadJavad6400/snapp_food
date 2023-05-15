<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function manage(Product $product , Request $request)
    {
        $type = $request->type;

        // The Current User Is Logged In
        $currentLoggedInUser = auth()->user();

        if($currentLoggedInUser) {
            $cart = Cart::firstOrCreate(['user_id' => $currentLoggedInUser->id]);

            // If The Item Is In The Shopping Cart, It Will Be Edited
            if($cartItem = $product->isInCart()) {
                if($type == 'plus') {
                    $cartItem->count++;
                }else {
                    $cartItem->count--;
                }
                
                $cartItem->payable = $cartItem->count * $product->price2;
                $cartItem->save();
            }else {
                $cartItem = CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'count' => 1,
                    'payable' => $product->price2
                ]);
            }  
            return back()->withMessage('محصول مورد نظر به سبد خرید اضافه شد');
            
        }else{
            return back()->withError('لطفا ابتدا وارد حساب کاربری خود شوید');
        }

    }
}
