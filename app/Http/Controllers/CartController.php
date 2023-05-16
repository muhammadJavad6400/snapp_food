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
            $cart = Cart::firstOrCreate(['user_id' => $currentLoggedInUser->id , 'finished' => 0]);

            // If The Item Is In The Shopping Cart, It Will Be Edited
            if($cartItem = $product->isInCart()) {
                if ($type == 'minus' && $cartItem->count == 1) {
                    $cartItem->delete();
                } else {
                    if($type == 'plus') {
                        $cartItem->count++;
                    }else {
                        $cartItem->count--;
                   }
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
            return [
                'count' => $cartItem->count,
                'totalCount' => $cart->total
            ];
            
        }else{
            return [
                'error' => 'لطفا ابتدا وارد حساب کاربری خود شوید'
            ];
        }

    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();

        return back()->withMessage('محصول مورد نظر از سبد خرید حذف شد');

    }

    public function finish()
    {
        $cart = Cart::where('user_id' , auth()->id())->where('finished' , 0)->first();
        if(!$cart) {
            return back()->withMessage('سبد خریدی وجود ندارد');
        }
        $cart->finished = 1;
        $cart->code = rand(100000 , 999999);
        $cart->save();
        return back()->withMessage("پرداخت شما با موفقیت در سیستم ثبت شد. کد پیگیری: $cart->code");      
    }
}
