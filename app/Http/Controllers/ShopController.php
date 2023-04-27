<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Notifications\NewShop;


class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' , 'admin']);   
    }
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return view('shop.index' ,  compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopRequest $request)
    {
        //validation Request
        $validation_shop = $request->validated();

        // create user in db
       // $randomPassword = random_int(1000 , 9999);
        $user = User::create([
            'name' => $validation_shop['username'],
            'email' => $validation_shop['email'],
            'role' => 'shop',
            'email_verified_at' => now(),
            'password' => bcrypt('shop')
        ]);

        //create shop in db
        Shop::create([
            'user_id' => $user->id,
            'title' => $validation_shop['title'],
            'first_name' => $validation_shop['first_name'],
            'last_name' => $validation_shop['last_name'],
            'telephone' => $validation_shop['telephone'],
            'address' => $validation_shop['address']
        ]);

        //notify user
        //$user->notify(new NewShop($user->email, $randomPassword));

        //redirect
        return redirect()->route('shop.index')->withMessage(__('SUCCESS'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        return view('shop.edit' , compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //validation update
        $validation_shop_update = $request->validated();
        
        //update 
        $shop->update($validation_shop_update);
        

        //redirect
        return redirect()->route('shop.index')->withMessage(__('SUCCESS'));
      
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        User::where('id' , $shop->user_id)->delete();
        $shop->delete();

         //redirect
         return redirect()->route('shop.index')->withMessage(__('DELETED'));

    }
}
