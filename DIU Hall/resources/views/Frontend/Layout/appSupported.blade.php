<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('Frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/googlefront.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/datatables-select.min.css')}}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">    <title>@yield('title')
    </title>
    <link type="text/css" rel="stylesheet" href="{{asset('Frontend/css/all.min.css')}}">


    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />

</head>
<body>





    @yield('content')









<script type="text/javascript" src="{{asset('Frontend/js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Frontend/js/jquery-3.5.1.js')}}"></script>

<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css')}}">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script src="{{asset('Frontend/js/axios.min.js')}}"></script>
<script src="{{asset('Frontend/js/datatables.min.js')}}"></script>
<script src="{{asset('Frontend/js/datatables-select.min.js')}}"></script>


<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js')}}"></script>

@yield('script')



</body>
</html>
