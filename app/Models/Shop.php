<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory , SoftDeletes;
    

    protected $fillable = [
        'user_id',
        'title',
        'first_name',
        'last_name',
        'telephone',
        'address',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);   
    }

    public function products()
    {
        return $this->hasMany(Product::class);
        
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
        
    }
}
