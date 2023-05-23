<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart as Order;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Shop;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('destroy');
        
    }

    
    public function index()
    {
        $currentLoggedInUser = auth()->user();

        if($currentLoggedInUser->role == 'shop') {

            // List Of Shops
            $currentShop = Shop::where('user_id' , $currentLoggedInUser->id)->first();

            // List Of Product Ids
            $productId = Product::where('shop_id' , $currentShop->id)->pluck('id')->toArray();
            
            // All Item Carts Whose Product_id Is In The $ProductId Range
            $items = CartItem::whereIn('product_id' , $productId)->paginate(10);
            
            return view('order.shop_index' , compact('items'));
            
        }else {
            $orders = Order::query();

        if($currentLoggedInUser->role == 'user') {
            $orders = $orders->where('user_id' , $currentLoggedInUser->id);
        }
        }
        $orders = $orders->paginate(10);
        return view('order.index' , compact('orders'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Order $order)
    {
        return view('order.show' , compact('order'));
    }

  
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(Order $order)
    {
        // Delete The Order And Items
        $order->delete();
        CartItem::where('cart_id' , $order->id)->delete();
        return back()->withMessage(__('DELETED'));
    }
}
