<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
    .container
    {
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:20px;
        
    }
    .table{
        border: 3px; solid pink;
        width:100px;
        height:250px;

    }
    th{
        background-color:#FFF0F3;
        color:black;
        font size: 20px;
        font-weight:bold;
        padding: 16px;
    }
    td{
        border:2px solid white;
        text-align: center;
        color: white;
        
     }

     input[type='search']
     {
      width: 510px;
      height:60px;
      margin-left:60px;
      background-color:#EAD3CD;
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
          
          <form action="{{url('product_search')}}" method="get">
            @csrf
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary" value="Search">

          </form>

          <div class ="container">

          <table class="table">
            <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

              @foreach($product as $products)
            <tr>
                <td>{{$products->title}}</td>


                <td>{!!Str::limit($products->description,50)!!}</td>


                <td>{{$products->category}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->quantity}}</td>
               


                <td>
                    <img height="130" width="130"src="products/{{$products->image}}">
                </td>
<td>
  <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
</td> 
                <td><a class="btn btn-danger"onClick="confirmation(event)" href="{{url('delete_product',$products->id)}}"
                ><i class="fa fa-trash"></i> Delete</a></td>


            </tr>

            @endforeach
</table>


          </div>
          <div class ="container"> {{$product->links()}}</div>
         

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