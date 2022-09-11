<div class="h-100 h-100 d-inline-block">
    <div class="row">
        <div class="col-sm-12">
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
{{--                                <a class="nav-link " href="{{ route('adminlogin') }}">Login</a>--}}
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
