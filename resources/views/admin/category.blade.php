<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
    input[type='text']
    {
        width: 500px;
        height: 45px;
    }

    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin:30px;
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
        
        <form action="{{url('add_category')}}" method="post">
            @csrf
          <div class="div_deg">
            <form action="#" method="POST">
              <div>
                <input type="text" name="category" placeholder="Enter Category" required>
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </form>
          </div>
          
          </div>
        </div>
      </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
