<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::paginate(9);
       return view('landing.products' , compact('products'));
    }

    public function shops()
    {
       return view('landing.shops');
    }
}
