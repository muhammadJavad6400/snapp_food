<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart as Order;
use App\Models\CartItem;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('destroy');
        
    }

    
    public function index()
    {
        $orders = Order::paginate(10);
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
