<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style type ="text/css">
    .div_deg{
        display:flex;
        align-items:center;
        justify-content:center;
        margin-top:20px
    }
    h1{
        color: grey;
    }

    label{
        display:inline-block;
        width:250px;
        font-size: 20px!important;
        color: grey!important;
    }
    input[type='text']{
        width: 310px;
        height:60px;
    }
    textarea{
        width: 450px;
        height:80px;
    }

    .input_dig{
        padding: 15px;
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

<h1>Add Product</h1>
          <div class="div_deg">
            
                <form action="{{url('upload_product')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_dig">
                        <label>
                            Product Title
                        </label>
                        <input type="text" name="title">
                    </div>




                    <div class="input_dig">
                        <label>
                            Description
                        </label>
                        <textarea name="description" required></textarea>
                        <!-- <input type="text" name="title"> -->
                    </div>







                    <div class="input_dig">
                        <label>
                            Price
                        </label>
                        <input type="text" name="price">
                    </div>

                    <div class="input_dig">
                        <label>
                            Quantity
                        </label>
                        <input type="number" name="qty">
                    </div>


                    <div class="input_dig">
                        <label>
                            Product category
                        </label>
                        <select name="category" required>

                            
                        <option>Select a Category</option>

                    @forEach($category as $category)


                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>


                    @endforEach
                    </select>
                        
                    </div>

                    <div class="input_dig">
                        <label>
                            Product Image
                        </label>
                        <input type="file" name="image">
                    </div>

                    <div class="input_dig">
                        
                        <input class="btn btn-success" type="submit" name="Add Product
                        ">
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