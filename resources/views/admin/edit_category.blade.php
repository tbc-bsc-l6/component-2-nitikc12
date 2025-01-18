<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')


   <style type="text/css">
    .deg
    {
        display:flex;
        justify-content: center;
        align-items:center;
        margin:70px;
    }
    input[type='text']
    {
        width: 450px;
        height:60px
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
        
          

          <h1 style="color:grey">Update Category</h1>

<div class="
deg">
<form action="{{url('update_category',$data->id)}}" method="post">
    @csrf
    
    <form>
        <input type="text" name="category" value="{{$data->category_name}}">

        <input class="update-btn"type="submit" value="Update Category">
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