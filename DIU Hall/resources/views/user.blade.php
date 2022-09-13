<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>


    </style>
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" --}}
    {{-- integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="Frontend/css/style.css"> --}}
    {{-- <link rel="stylesheet" href="Frontend/css/googlefront.css"> --}}




</head>

<body>
    <div class="container-width ">




        <div class=""></div>
        <div class="container mb-0 cvContainer2 mt-5">
            <div class="cvContainer">
                <div class="align-items-center me-5 bg-white text-danger">


                    <div class="">
                        {{-- <img src='{{$pic}}' alt=""/> --}}
                        {{-- <img src="'/Frontend/images/Owner.jpg" alt=""> --}}

                        {{-- <img src="{{ public_path() . $img }}"> --}}

                        {{-- <img src="{{('http://127.0.0.1:8000/storage/Ii0uiUTGMAWBMcv0jRk6q8vX9JeT22j9TzBDLe6S.jpg') }}" style="width: 200px; height: 200px"> --}}


                        {{-- <img class="cvimg1" src="{{ public_path('storage/public/Ii0uiUTGMAWBMcv0jRk6q8vX9JeT22j9TzBDLe6S.jpg') }}" /> --}}
                        {{-- <img class="cvimg1" src='{{ public_path("{$singlestudent['student_img']}") }}' /> --}}

                    </div>



                    <div class="">
                        <h1 class="mb-5">About Me</h1>
                        <pre><h6>Name            {{ $singlestudent['student_name'] }}</h6></pre>
                        <pre><h6>Profession      {{ $singlestudent['profession'] }}</h6></pre>
                        <pre><h6>Age             {{ $singlestudent['student_age'] }}</h6></pre>
                        <pre><h6>Email           {{ $singlestudent['student_email'] }}</h6></pre>
                        <pre><h6>Phone           {{ $singlestudent['student_phone'] }}</h6></pre>
                        <pre><h6>University      {{ $singlestudent['student_university'] }}</h6></pre>

                    </div>

                    <h1 class="mt-5 address mb-5">Address</h1>

                    <div class="">
                        <h3 class="">Present Address </h3>
                        <p>{{ $singlestudent['student_presentAddress'] }}</p>

                        <h3 class="mb-5">Permanent Address </h3>
                        <p>{{ $singlestudent['student_permanentAddress'] }}</p>
                        <h1 class="mb-5"></h1>
                        <h1 class="mt-2 mb-5 mt-5">Guardian Info</h1>

                        <h3 class="">Main Guardian</h3>
                        <p>Father's Name : {{ $singlestudent['student_fatherName'] }}</p>
                        <p>Father's Contact No : {{ $singlestudent['student_fatherContact'] }}</p>
                        <p>Mother's Name : {{ $singlestudent['student_motherName'] }}</p>
                        <p>Mother's Contact No : {{ $singlestudent['student_motherContact'] }}</p>


                        <h3 class="">Local Guardian</h3>

                        <p>Father's Name : {{ $singlestudent['student_fatherName'] }}</p>
                        <p>Father's Contact No : {{ $singlestudent['student_fatherContact'] }}</p>
                        <p>Mother's Name : {{ $singlestudent['student_motherName'] }}</p>
                        <p>Mother's Contact No : {{ $singlestudent['student_motherContact'] }}</p>

                    </div>






                </div>


            </div>
        </div>
    </div>





</body>

</html>
