<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'price',
        'discount',
        'Row_material',
        'image',
    ];

    public function shops()
    {
        return $this->belongsTo(Shop::class);
        
    }
}
