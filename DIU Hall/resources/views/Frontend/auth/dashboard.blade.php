<div class="">

    <nav class="navbar navbar-expand-lg bg-primary text-white">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">DIU Hall</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    <a class="nav-link text-white"  href="/contactPage">Contact</a>
{{--                    <a class="nav-link text-white" href="#">Help</a>--}}
{{--                    <a class="nav-link text-white">Game</a>--}}


                </div>

            </div>
{{--                    <h5>{{Auth::user()->name}}</h5>--}}
{{--            {{isset(Auth::user()->name)}}--}}
            @guest('web')
                <li class="nav-item " style="list-style-type: none;">
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item" style="list-style-type: none;">
                    <a class="nav-link text-white" href="{{ route('register-user') }}">Register</a>
                </li>
            @else
                <li class="nav-item" style="list-style-type: none;">
                    @php
                        $StudentID =  Illuminate\Support\Facades\Auth::user()->StudentID;
                       $StudentID2 = App\Models\manyStudentModel::where(['student_id' =>  $StudentID])->get();
                       foreach ($StudentID2 as $StudentID2) {
                            $student_img  = $StudentID2-> student_img ;
                       }
                      //$std = $StudentID2->student_id;

                        $string =  $StudentID2-> student_img;
                        $token = strtok($string, "/");
                        $token = strtok("/");
                        $token = strtok("/");
                        $token = strtok("/");
                        $imgPath = $token;

                    @endphp
                    <div class="dropdown">
                        <a
                            class="dropdown-toggle d-flex align-items-center hidden-arrow me-3"
                            href="#"
                            id="navbarDropdownMenuAvatar"
                            role="button"
                            data-mdb-toggle="dropdown"
                            aria-expanded="false"
                        >

                    <img class="mb-sm-2 mb-md-2 " loading="lazy" style="width: 50px; height: 50px; border: 2px solid #f3066e;border-radius: 50%" src="{{ $student_img }}"/>

                        </a>


                        <ul
                            class="dropdown-menu dropdown-menu-end mt-2"
                            aria-labelledby="navbarDropdownMenuAvatar"
                            style="width: 300px;"
                        >
                            <h5 class="card-title text-black text-muted m-4">Signed in as {{ $StudentID2-> student_name}}</h5>

                            <li class="dropdown-item1">
                                <a class="dropdown-item" href="/studentSearch/{{$StudentID2-> student_id}}">My Profile</a>
                            </li>
                            <li class="dropdown-item1">
                                <a class="dropdown-item" href="/changePassword/{{$StudentID2-> student_id}}/{{$imgPath}}">Change Password</a>
                            </li>
                            <li class="dropdown-item1">
                                <a class="dropdown-item" href="{{ route('signout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>


                </li>
            @endguest
            <form class="d-flex input-group w-auto p-sm-2 p-md-2">


                <input type="search" class="form-control id-search" placeholder="Student Search" aria-label="Search" />
                <button class="btn searchButton text-white btn-success " type="button">
                    Search
                </button>
            </form>
        </div>

    </nav>
</div>







