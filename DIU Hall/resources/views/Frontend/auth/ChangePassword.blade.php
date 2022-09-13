@extends('Frontend.Layout.appSupported')
@section('title', 'Contact')

@section('content')
    @include('Frontend.auth.dashboard')

    <div class="container">
        <div class="row d-flex justify-content-center">


            <div class="col-lg-5 col-md-12 col-sm-12 bg-light p-lg-5 mt-2">
                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <h1 class="d-none stdID">{{ $id }}</h1>
                    <img style="width: 120px; height: 120px; position: relative; left: 37%; border-radius: 50%; border: #0080ff 1px solid"
                        src="http://127.0.0.1:8000/storage/{{ $img }}" alt="img" />
                    <form action="{{ route('change.custom') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group mb-3 mt-2">
                            <input type="text" placeholder="{{ $id }}" id="id" class="form-control"
                                name="id" disabled>

                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Old Password" id="old" class="form-control"
                                name="old" required autofocus>
                            @if ($errors->has('old'))
                                <span class="text-danger">{{ $errors->first('old') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="New Password" id="newPassword" class="form-control"
                                name="new" required autofocus>
                            @if ($errors->has('new'))
                                <span class="text-danger">{{ $errors->first('new') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" placeholder="Conform Password" id="conformPassword" class="form-control"
                                name="conf" required autofocus>
                            @if ($errors->has('conf'))
                                <span class="text-danger">{{ $errors->first('conf') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <div class="checkbox">
                                {{-- <label><input type="checkbox" name="remember"> Remember Me</label> --}}
                            </div>
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>


        <div class="fixed-bottom">

            @include('Frontend.Footer')
        </div>
    @endsection



    @section('script')

        <script type="text/javascript">
            let oldPassword = $('.oldPassword').val();
            let newPassword = $('.newPassword').val();
            let conformPassword = $('.conformPassword').val();
            let id = $('.stdID').html();


            $('.submit').click(function() {

                alert(oldPassword + newPassword + conformPassword);

                if (newPassword == conformPassword) {

                    axios.post('/changePasswordPost', {
                                old: oldPassword,
                                new: newPassword,
                                id: id
                            }

                        )
                        .then(function(response) {




                            if (response.data == 1) {

                                alert("Password Change Successfully Done !")

                            } else {
                                alert("Password not Change . after try again !")
                            }


                        }).catch(function(error) {



                        });
                } else {
                    alert("Your Password does not match");
                }
            })
        </script>


    @endsection
