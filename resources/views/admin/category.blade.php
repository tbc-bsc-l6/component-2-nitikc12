<!DOCTYPE html>
<html lang="en">
  <head> 
    @include('admin.css')

    <style type="text/css">
      input[type='text'] {
          width: 500px;
          height: 45px;
      }

      .div_deg {
          display: flex;
          justify-content: center;
          align-items: center;
          margin:30px;
      }

      .table_deg {
        text-align:center;
        margin:auto;
        border:3px solid white;
        margin-top:6px;
        width: 700px
      }

      th {
        background-color: pink;
        padding: 17px;
        font-size: 22px;
        font-weight:bold;
      }

      td {
        color: white;
        border: 2px solid pink;
        padding:12px;
      }
    </style>
  </head>
  <body>
    <header>
      @include('admin.header')
    </header>
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          <form action="{{url('add_category')}}" method="post">
            @csrf
            <div class="div_deg">
              <div>
                <input type="text" name="category" placeholder="Enter Category" required>
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </div>
          </form>

          <table class="table_deg">
            <tr>
              <th>Category Name</th>
              <th>Delete</th>
            </tr>

            @foreach($data as $data)
            <tr>
              <td>{{$data->category_name}}</td>
              <td>
                <!-- Use the confirmation function onClick -->
                <a class="btn-delete" href="{{url('delete_category', $data->id)}}" onClick="confirmation(event)">Delete</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>

    <!-- SweetAlert 2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Your confirmation function -->
    <script type="text/javascript">
      function confirmation(ev) {
        ev.preventDefault();  // Prevent the default anchor action

        var urlToRedirect = ev.currentTarget.getAttribute('href');  // Get the URL to redirect to

        console.log(urlToRedirect);  // Debugging: make sure the URL is correct

        swal({
          title: "Are You Sure that You want to Delete This?",
          text: "This delete will be permanent",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = urlToRedirect;  // Redirect to the delete URL
          }
        });
      }
    </script>

    <!-- Include JS files -->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>ss
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>

  </body>
</html>
