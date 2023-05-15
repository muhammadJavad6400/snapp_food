<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        // The Current User Is Logged In
        $currentLoggedInUser = auth()->user();
        if($currentLoggedInUser) {
            dd('ok');
        }else{
            return back()->withError('لطفا ابتدا وارد حساب کاربری خود شوید');
        }
        
    }
}
