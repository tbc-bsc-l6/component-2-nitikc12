<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Product;


class AdminController extends Controller
{
    public function view_category(){


        $data = Category::all();
        return view('admin.category',compact('data'));
    }


    public function add_category(Request $request){
      
        $category = new Category; 

        $category->category_name = $request->category;

        $category->save();
        toastr()->addSuccess('Category added Successfully');

        return redirect()->back();

    }


    // public function delete_category($id)
    // {
    // $data = Category::find($id);

    
    // $data->delete();

    // toastr()->timeOut(1000)->closeButton()->addSuccess('Category Deleted Successfully');
    // return redirect()->back();
    // }


    


    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);

        $data->category_name= $request->category;
        $data->save();
       return redirect('/view_category');
     }

     public function add_product()
     {

        $category = Category::all();
        return view('admin.add_product',compact('category'));
     }







     public function upload_product(Request $request)
     {
      
        $data = new Product;
        $data->title =  $request->title;

        $data->description=  $request->description;

        $data->price =  $request->price;

        $data->quantity =  $request->qty;

        $data->category =  $request->category;

        $data->title =  $request->title;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        $data->save();
toastr()->timeOut(1000)->closeButton()->addSuccess('Product Added Successfully');

        return redirect()->back();

     }

     public function view_product()
     {
        $product = Product::paginate(3);
        return view('admin.view_product',compact('product'));
     }

     public function delete_product($id)
     {
         // Find the product by its ID
         $data = Product::find($id);
     
         // Check if the product exists
         if (!$data) {
             toastr()->timeOut(1000)->closeButton()->addError('Product not found!');
             return redirect()->back();
         }
     
         // Get the path to the product image
         $image_path = public_path('products/'.$data->image);
     
         // Check if the image exists, then delete it
         if (file_exists($image_path)) {
             unlink($image_path);
         }
     
         // Delete related cart items
         \App\Models\Cart::where('product_id', $id)->delete();
     
         // Now delete the product
         $data->delete();
     
         toastr()->timeOut(1000)->closeButton()->addSuccess('Product Deleted Successfully');
         
         return redirect()->back();
     }
     


public function update_product($id){

    $data = Product::find($id);

    $category = Category::all();

    return view('admin.update_page',compact('data','category'));
}



public function edit_product(Request $request, $id)
{
    // Find the product by its ID
    $data = Product::find($id);

    // Update the product details
    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->quantity = $request->quantity;

    // Handle the image upload if a new image is provided
    $image = $request->image;
    if ($image) {
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('products', $imagename);
        $data->image = $imagename;
    }

    // Save the updated product to the database
    $data->save();

    // Flash success message
    toastr()->timeOut(1000)->closeButton()->addSuccess('Product Updated Successfully');

    // Redirect back to the view product page
    return redirect('/view_product');
}




public function uploadProduct(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Store the image in the public/products directory
    $imagePath = $request->file('image')->store('products', 'public'); // Store in public/products

    $product = new Product();
    $product->title = $request->input('title');
    $product->image = $imagePath; // Save image path in database
    $product->save();

    return redirect()->back()->with('success', 'Product uploaded successfully');
}


public function view_order(){
    return view('admin.order');
    
}
}

