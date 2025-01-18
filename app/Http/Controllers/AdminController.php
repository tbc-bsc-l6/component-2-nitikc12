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


    public function delete_category($id)
    {
    $data = Category::find($id);

    
    $data->delete();

    toastr()->timeOut(1000)->closeButton()->addSuccess('Category Deleted Successfully');
    return redirect()->back();
    }


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
}
