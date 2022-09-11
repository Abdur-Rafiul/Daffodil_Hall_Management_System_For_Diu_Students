<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/css/datatables-select.min.css')}}">




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('Frontend/css/st.css')}}">
    <title>DIU Hall</title>
</head>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                class="fas fa-user-secret me-2"></i>DIU Hall</div>
        <div class="list-group list-group-flush my-3 text-success">
            <a href="/dashboard1" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    class="primary-text fas fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{url('/floor')}}" class="text-success list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="primary-text fa-solid  fa-building-columns me-2"></i>Floor</a>
            <a href="{{url('/unit')}}" class=" text-success list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="primary-text fa-solid  fa-hotel me-2"></i>Unit</a>
            <a href="{{url('/studentApplication')}}" class="text-success list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="primary-text fa-solid  fa-graduation-cap me-2"></i>Application</a>
            <a href="{{url('/paymentAdminControl')}}" class="text-success list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="primary-text fa-solid  fa-cart-shopping me-2"></i>Payment</a>

            @guest('admin')
{{--                <li class="nav-item" style="list-style-type: none;">--}}
{{--                    --}}{{--                                <a class="nav-link " href="{{ route('adminlogin') }}">Login</a>--}}
{{--                </li>--}}
            @else
                <span class="nav-item primary-text">
                    <a href="{{ route('adminsignout') }}" class="text-success list-group-item list-group-item-action second-text fw-bold">
                    <i class="fas fa-power-off me-2 primary-text"></i>Logout</a>
                </span>
            @endguest

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        </nav>

        <div class="container-fluid px-4 py-0 pb-5">
            @yield('content')
       </div>
<!-- /#page-content-wrapper -->
</div>
</div>




    <script type="text/javascript" src="{{asset('Frontend/js/mdb.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Frontend/js/jquery-3.5.1.js')}}"></script>





    <script src="{{asset('Frontend/js/datatables.min.js')}}"></script>
    <script src="{{asset('Frontend/js/datatables-select.min.js')}}"></script>
    <script src="{{asset('Frontend/js/custom.js')}}"></script>
    <script src="{{asset('Frontend/js/axios.min.js')}}"></script>

    @yield('script')
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>--}}
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>

</html>
