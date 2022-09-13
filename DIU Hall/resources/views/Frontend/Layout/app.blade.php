<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/googlefront.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/datatables-select.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title')
    </title>
    <link type="text/css" rel="stylesheet" href="{{ asset('Frontend/css/all.min.css') }}">


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

</head>

<body>




    <div class="">
        @include('Frontend.auth.dashboard')
        @yield('content')
        @include('Frontend.Footer')
    </div>








    <script type="text/javascript" src="{{ asset('Frontend/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('Frontend/js/jquery-3.5.1.js') }}"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('Frontend/js/custom.js') }}"></script>
    <script src="{{ asset('Frontend/js/axios.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/datatables.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/datatables-select.min.js') }}"></script>


    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js') }}"></script>

    @yield('script')


    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>

</body>

</html>
