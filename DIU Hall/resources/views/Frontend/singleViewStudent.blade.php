@extends('Frontend.Layout.app')
@section('content')


<div class="top-background bg-light"></div>
<div class=" mb-0 cvContainer1 mt-0">
    <div class="container-fluid cvContainer">
        <div class="row ">


            @foreach($student as $singlestudent)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <img class="cvimg w-100" src="{{asset($singlestudent['student_img'])}}" />
            </div>
            <div class="mt-4 col-lg-8 col-md-6 col-sm-12 align-self-center text-center">
                <h2>{{$singlestudent['student_name']}}</h2>
                <h5>{{$singlestudent['profession']}}</h5>
                <Button class="btn-lg text-white bg-dark"><i class="fa fa-download p-2"></i><a class="text-white"
                        href="/pdf/{{$singlestudent['student_id']}}">Download
                        CV</a></Button>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12  mt-5">
                <h1 class="text-center">About Me</h1>


            </div>

            <div class="col-lg-8 col-md-6 col-sm-12">
                <p class="text-center">
                <h5>Age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$singlestudent['student_age']}}
                </h5>
                <h5>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$singlestudent['student_email']}}
                </h5>
                <h5>Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$singlestudent['student_phone']}}
                </h5>
                <h5>University&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$singlestudent['student_university']}}
                </h5>

                </p>
            </div>
            <hr>
            <h1 class="mt-2 address text-center">Address</h1>

            <div class="col-lg-5 col-md-12 col-sm-12 text-center mb-0">
                <h3 class="ms-5">Present Address </h3>
                <p>{{$singlestudent['student_presentAddress']}}</p>

            </div>

            <div class="text-center col-lg-7 col-md-6 col-sm-12 mb-0">
                <h3 class="ms-5">Permanent Address </h3>
                <p>{{$singlestudent['student_permanentAddress']}}</p>
            </div>
            <hr>
            <h1 class="mt-2 text-center">Guardian Info</h1>
            <div class="col-lg-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-left mb-0">
                <h3 class="mb-5">Main Guardian</h3>
                <p>Father's Name : {{$singlestudent['student_fatherName']}}</p>
                <p>Father's Contact No : {{$singlestudent['student_fatherContact']}}</p>
                <p>Mother's Name : {{$singlestudent['student_motherName']}}</p>
                <p>Mother's Contact No : {{$singlestudent['student_motherContact']}}</p>

            </div>

            <div class="col-lg-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-12 text-left mb-0">
                <h3 class="mb-5">Local Guardian</h3>

                <p>Father's Name : {{$singlestudent['student_fatherName']}}</p>
                <p>Father's Contact No : {{$singlestudent['student_fatherContact']}}</p>
                <p>Mother's Name : {{$singlestudent['student_motherName']}}</p>
                <p>Mother's Contact No : {{$singlestudent['student_motherContact']}}</p>

            </div>


            @endforeach



        </div>


    </div>






    @endsection
