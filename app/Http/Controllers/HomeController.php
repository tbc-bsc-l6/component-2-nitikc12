<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


use App\Models\User;

use App\Models\Cart;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }


    public function home(){

        $product = Product::all();

        return view('home.index',compact('product'));
    }


    public function login_home(){
        $product = Product::all();

        $user = Auth::user();

        $userid = $user->id;
        
        $count = Cart::where('user_id', $userid)->count();


        return view('home.index',compact('product','count'));
    }

    public function add_cart($id)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add products to the cart.');
        }
    
        // Get the product ID and the authenticated user's ID
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
    
        // Check if the product exists (optional but recommended)
        $product = Product::find($product_id);
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.');
        }
    
        // Create a new Cart entry
        $cartItem = new Cart;
        $cartItem->user_id = $user_id;
        $cartItem->product_id = $product_id;
    
        // Save the cart item to the database
        if ($cartItem->save()) {
            toastr()->timeOut(1000)->closeButton()->addSuccess('Product added to cart successfully');
        } else {
            toastr()->timeOut(1000)->closeButton()->addError('Failed to add product to cart');
        }
    
        // Redirect back to the previous page
        return redirect()->back();
    }
    



    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            // Get the count of items in the cart
            $count = Cart::where('user_id', $userid)->count();

            // Get the cart items for this user
            $cart = Cart::where('user_id', $userid)->get();
        }

        // Return the view with cart items and count
        return view('home.mycart', compact('count', 'cart'));
    }

}
