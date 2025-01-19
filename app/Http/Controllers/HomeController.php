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

        return view('home.index',compact('product'));
    }


    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data= new Cart;


        $data->user_id = $user_id;


        $data->product_id = $product_id;

        $data->save();
        $data->delete();
    toastr()->timeOut(1000)->closeButton()->addSuccess('Product Added to cart Successfully');

        return redirect()->back();

    }
}
