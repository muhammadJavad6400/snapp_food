<?php

function persionDate($enDate)
{
    $faDate = \Morilog\Jalali\Jalalian::fromCarbon($enDate);
    return $faDate->format('Y-m-d');
}

function short($string, $max=50)
{
    return mb_strlen($string) > $max ? mb_substr($string, 0, $max).'...' : $string;
}


function upload($newFile)
{
    $filename = randomSHA().".".$newFile->getClientOriginalExtension();
    $newFile->move(base_path('storage/app/public'), $filename);
    return "storage/$filename";
}

function deleteFile($path)
{
    \File::delete($path);
}

function randomSHA()
{
    return bin2hex(random_bytes(10));
}

function currentShopId()
{
    $shop = \App\Models\Shop::where('user_id' , auth()->id())->firstOrfail();
    return $shop->id ?? 0;
}

function checkPolicy($model , $object)
{
    switch ($model) {
        case 'product':
            if($object->shop_id != currentShopId()){

                abort(403);
            }
            break;
        
        default:
            abort(403);
            break;
    }  
}


function currentLandingPage() {
    if (request()->routeIs('landing')) {
        $route = request()->route();
        return $route->parameters['page'];
    }
}

// Number Of Items Per Cart
function cartCount()
{
    $user = auth()->user();
    $count = 0;
    if($user) {
        $cart = \App\Models\Cart::where('user_id' , $user->id)->first();
        if($cart) {
            $count = \App\Models\CartItem::where('cart_id' , $cart->id)->sum('count');
        }
    }
    return $count;
}
