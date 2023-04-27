<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    

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
}
