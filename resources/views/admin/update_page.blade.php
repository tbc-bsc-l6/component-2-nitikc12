<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  
   <style type="text/css">
.container{
    display:flex;
    justify-content:center;
    align-items:center;
}
textarea{
    width: 410px;
    height: 80px;
}

label{
    display:inline-block;
    width:210px;
    padding:20px;
}

input[type='text']
{
    width: 310px;
    height: 70px;
}

    </style>
  </head>
  <body>
  <header>
  @include('admin.header')
  </header>
   @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          
          <h2>Update Product</h2>

          <div class="container">
            <form action ="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data"> 


            @csrf
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>

                <div>
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>


                
                <div>
                    <label>Price</label>
                    <input type="text" name="price" value="{{$data->price}}">
                    
                </div>

                <div>
                    <label>Quantity</label>
                    <input type="numver" name="quantity" value="{{$data->quantity}}">
                    
                </div>



                <div>
                    <label>Category</label>
                    <select name="category">
                        <option value="{{$data->category}}">{{$data->category}}</option>
                   @forEach($category as $category)
                        <option value="{$category->category_name}}">{{$category->category_name}}</option>
                    </select>
                    
                </div>

                <div>
                    <label>Current Image</label>
                    <img width="160" src="/products/{{$data->image}}">
                </div>

<div>
    <label>New Image</label>
    <input type="file" name="image">
</div>
                
                <div>

                <input class="btn btn-success"type="submit" name="">
                </div>


            </form>
          </div>

</div>
</div>
    </div>
    <!-- JavaScript files-->
     @include('admin.js')
    <!-- <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html> -->