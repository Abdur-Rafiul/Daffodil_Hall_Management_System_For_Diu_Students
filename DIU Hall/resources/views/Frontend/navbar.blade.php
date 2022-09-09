


{{--   Navbar Not Working in Our Website--}}


<div class="">

    <nav class="navbar navbar-expand-lg bg-primary text-white">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">Rahat Villa</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    <a class="nav-link text-white"  href="#">Contact</a>
                    <a class="nav-link text-white" href="#">Help</a>
                    <a class="nav-link text-white">Game</a>


                </div>

            </div>
{{--            <h5>{{Auth::user()->name}}</h5>--}}

            <div class="navbar-nav">
                <a class="nav-link active text-white loginClass" aria-current="page" href="/StudentLogin">Login</a>
                <a class="nav-link active text-white registrationClass" aria-current="page" href="/">Register</a>
                <span class="d-none profile"><i class="fa-solid fa-3x fa-house-user me-3 text-white loginbtnicon"></i></span>



            </div>


            <form class="d-flex input-group w-auto">


                <input type="search" class="form-control id-search" placeholder="Student Search" aria-label="Search" />
                <button class="btn searchButton text-white" type="button">
                    Search
                </button>
            </form>
        </div>

    </nav>
</div>


<!-- login -->
<div class="modal fade" id="loginbtnIcon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">



                    <div class="d-grid gap-3 text-center">
                        <h3>Please Login in Website</h3>
                        <button class="btn btn-lg btn-primary p-3 mt-5 mb-5 p-3 onLogin" type="button"><a class="text-white" href="/StudentLogin">Login</a></button>
                        <button class="btn btn-lg btn-dark p-3 mt-5 mb-5 p-3 onLogin" type="button"><a class="text-white" href="/onLogout">Logout</a></button>





                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
