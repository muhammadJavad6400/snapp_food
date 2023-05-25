<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'shop_id',
        'title',
        'price',
        'discount',
        'Row_material',
        'image',
    ];
    protected $appends = ['price2'];

    public function getPrice2Attribute()
    {
        return $this->price - (($this->price * $this->discount) / 100);    
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);    
    }

    // Is The Item In The Cart Or Not?
    public function isInCart()
    {
        $user = auth()->user();
        if($user) {
            $cart = Cart::where('user_id' , $user->id)->where('finished' , 0)->first();
            if($cart) {
                return CartItem::where('cart_id' , $cart->id)->where('product_id' , $this->id)->first();
            }
        }
        
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'owner');
        
    }
}
