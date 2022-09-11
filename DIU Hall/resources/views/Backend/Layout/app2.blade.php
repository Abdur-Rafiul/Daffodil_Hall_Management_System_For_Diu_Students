<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/datatables-select.min.css')}}">
    <title>@yield('title')
    </title>


</head>

<body>




    <div class="row">
        <div class="col-lg-3 col-lg- col-md-12 col-sm-12">@include('Backend.Layout.Menu')</div>
        <div class="col-md-12 scroll">
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-12 col-sm-12 col-lg-9"> @yield('content')</div>
          </div>


        </div>

    </div>




<script type="text/javascript" src="{{asset('Frontend/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Frontend/js/jquery-3.5.1.js')}}"></script>
<script type="text/javascript" src="{{asset('Frontend/js/popper.min.js')}}"></script>
<


<script src="{{asset('Frontend/js/datatables.min.js')}}"></script>
<script src="{{asset('Frontend/js/datatables-select.min.js')}}"></script>
<script src="{{asset('Frontend/js/custom.js')}}"></script>
<script src="{{asset('Frontend/js/axios.min.js')}}"></script>

    @yield('script')

</body>

</html>
