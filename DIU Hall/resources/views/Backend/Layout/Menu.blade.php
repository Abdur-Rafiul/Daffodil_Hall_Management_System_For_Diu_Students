<div class="h-100 h-100 d-inline-block">
    <div class="row">
        <div class=" ">
            <div class="card" style="background-color:#ececec">
                <div class="card-img mt-3 mb-1 p-3">
                    <img class="mx-auto d-block mt-1 rounded border border-success" style="width:50%; height:160px; "
                        src="{{asset('Frontend\images\robin.jpg')}}" alt="">
                </div>

                <div class="card-body">
                    <ul>
                        <li><i class="fa-solid fa-2x fa-chalkboard"></i><a href="/dashboard1">Dashboard</a></li>
{{--                        <li><i class="fa-solid fa-2x fa-envelope-open-text"></i><a href="">Notice</a></li>--}}
{{--                        <li><i class="fa-solid fa-2x fa-image"></i><a href="">Slider</a></li>--}}
                        <li><i class="fa-solid fa-2x fa-building-columns"></i><a href="{{url('/floor')}}">Floor</a></li>
                        <li><i class="fa-solid fa-2x fa-hotel"></i><a href="{{url('/unit')}}">Unit</a></li>
                        <li><i class="fa-solid fa-2x fa-graduation-cap"></i><a href="{{url('/studentApplication')}}">
                                Application</a></li>
                        <li><i class="fa-solid fa-2x fa-cart-shopping"></i><a
                                href="{{url('/paymentAdminControl')}}">Payment</a></li>
                        @guest('admin')
                            <li class="nav-item" style="list-style-type: none;">
                                <a class="nav-link " href="{{ route('adminlogin') }}">Login</a>
                            </li>
                        @else
                            <li class="nav-item" style="list-style-type: none;">
                                <i class=" fa-2x fa-solid fa-right-from-bracket"></i>
                        <a href="{{ route('adminsignout') }}">Logout</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
///Menubar
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark"
                            href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                    <li class="nav-item m-l-10"> <a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                    <li class="nav-item mt-3">ADMIN</li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item"><a href="/logout" class="btn btn-sm btn-danger">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>

                    <li><a href="/dashboard"><span><i class="fa-solid fa-chalkboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li><a href=""><span><i class="fa-solid fa-envelope-open-text"></i><span class="hide-menu">Notice</span></a></li>
                    <li><a href=""><span><i class="fa-solid fa-image"></i><span class="hide-menu">Slider</span></a></li>
                    <li><a href="{{url('/floor')}}"><span><i class="fa-solid fa-building-columns"></i><span class="hide-menu">Floor</span></a></li>
                    <li><a href="{{url('/unit')}}"><span><i class="fa-solid fa-hotel"></i><span class="hide-menu">Unit</span></a></li>
                    <li><a href="{{url('/studentApplication')}}"><span><i class="fa-solid fa-graduation-cap"></i><span class="hide-menu">Student</span>
                            Application</a></li>
                    <li><a href="{{url('/paymentAdminControl')}}"><span><i class="fa-solid fa-cart-shopping"></i><span class="hide-menu">Payment</span></a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-wrapper"> -->
