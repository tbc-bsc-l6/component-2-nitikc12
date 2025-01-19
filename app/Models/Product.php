<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = ['title', 'description', 'price', 'image']; // Add 'image' if it's stored in your database

    // Accessor for product image URL
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image); // Adjust path based on your storage configuration
    }



}



