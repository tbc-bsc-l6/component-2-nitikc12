<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Method to handle product upload
    public function uploadProduct(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        $imagePath = $request->file('image')->store('product', 'public');


        // Create and save the product
        $product = new Product();
        $product->title = $request->input('title');
        $product->image = $imagePath; // Save the image path
        $product->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product uploaded successfully');
    }
}
