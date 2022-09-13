<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <div class="cvContainer">
        <div class="align-items-center me-5 bg-white text-danger">

            <div class="">
                {{-- <img class="cvimg1" src="{{$singlestudent['student_img']}}" /> --}}
                {{ $singlestudent['student_img'] }}
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
</body>

</html>
