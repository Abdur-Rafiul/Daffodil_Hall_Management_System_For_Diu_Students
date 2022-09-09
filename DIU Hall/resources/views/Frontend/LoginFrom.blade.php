@extends('backend.Layout.app2')

@section('content')

<div class="container">
    <div class="d-flex align-items-center" style="height:100%;">
        <div class="col">

        </div>

        <div class="col bg-light p-5">
            <button class="btn-secondary btn-lg">Back</button>
            <div class="form-outline mt-3">
                <input type="text" id="form12" class="form-control studentId2" />
                <label class="form-label" for="form12">Enter Your Student ID</label>

            </div>
            <div class="form-outline mt-3">
                <input type="text" id="form12" class="form-control studentPaassword2" />
                <label class="form-label" for="form12">Enter Your Password</label>

            </div>


            <div class="d-grid gap-3">
                <button class="btn btn-lg btn-primary p-3 mt-5 onLogin" type="button">Login</button>
                <a class="forgot btn-link">Forgot Password</a>

                <button class="new-account btn btn-lg btn-success p-3 mt-5" type="button">Create New Account</button>


            </div>






        </div>
        <div class="col">

        </div>

    </div>




    <!-- Create New Account -->
    <div class="modal fade" id="NewAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">


                        <div class="col-md-12 bg-light">
                            <h4>Sign Up</h4>
                            <span>It's Quick And Easy</span>

                            <div class="form-outline mt-3">
                                <input type="text" id="form12" class="form-control studentId" />
                                <label class="form-label" for="form12">Enter Your Student ID</label>

                            </div>
                            <div class="form-outline mt-3">
                                <input type="text" id="form12" class="form-control studentName" />
                                <label class="form-label" for="form12">Enter Your Student Name</label>

                            </div>
                            <div class="form-outline mt-3">
                                <input type="text" id="form12" class="form-control studentEmail" />
                                <label class="form-label" for="form12">Enter Your Email</label>

                            </div>
                            <div class="form-outline mt-3">
                                <input type="text" id="form12" class="form-control studentPhoneNumber" />
                                <label class="form-label" for="form12">Enter Your Phone Number</label>

                            </div>
                            <div class="form-outline mt-3">
                                <input type="text" id="form12" class="form-control studentPassword" />
                                <label class="form-label" for="form12">Enter Your Password</label>

                            </div>
                            <div class="form-outline mt-3">
                                <input type="text" id="form12" class="form-control studentConfirmPassword" />
                                <label class="form-label" for="form12">Enter Your Confrm Password</label>

                            </div>



                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary newAccount">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password -->
    <div class="modal fade" id="ForgotPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">


                        <div class="col-md-12 bg-light">

                            <div class="form-outline mt-4">
                                <input type="text" id="form12" class="form-control studentId1" />
                                <label class="form-label" for="form12">Enter Your Student ID</label>

                            </div>
                            <div class="form-outline mt-4">
                                <input type="text" id="form12" class="form-control studentEmail1" />
                                <label class="form-label" for="form12">Enter Your Email</label>

                            </div>
                            <div class="form-outline mt-4">
                                <input type="text" id="form12" class="form-control studentPhoneNumber1" />
                                <label class="form-label" for="form12">Enter Your Phone Number</label>

                            </div>
                            <div class="form-outline mt-4">
                                <input type="text" id="form12" class="form-control studentOldPassword" />
                                <label class="form-label" for="form12">Enter Your Old Password</label>

                            </div>
                            <div class="form-outline mt-4">
                                <input type="text" id="form12" class="form-control studentNewPassword" />
                                <label class="form-label" for="form12">Enter Your New Password</label>

                            </div>



                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary forgotbtn">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection



@section('script')

<script type=text/javascript>
$('.new-account').click(function() {

    $('#NewAccountModal').modal('show');
})

$('.forgot').click(function() {

    $('#ForgotPasswordModal').modal('show');
})


///Create New Account




$('.newAccount').click(function() {




    var studentId = $('.studentId').val();
    var studentEmail = $('.studentEmail').val();
    var studentPhoneNumber = $('.studentPhoneNumber').val();
    var studentPassword = $('.studentPassword').val();
    var studentConfirmPassword = $('.studentConfirmPassword').val();
    var studentName = $('.studentName').val();

//alert(studentId);

let url = "/submitNewAccount";
axios.post(url,
{
    studentId: studentId,
        studentEmail: studentEmail,
        studentPhoneNumber: studentPhoneNumber,
        studentPassword: studentPassword,
        studentName: studentName
}


).then(
    res => {
        alert("Account Created Successfully")
        window.location.href = "/StudentLogin";

    }).catch(err => {

        alert('Account Not Create')
    console.log(err);


});


})




$('.forgotbtn').click(function() {



    var studentId1 = $('.studentId1').val();
    var studentEmail1 = $('.studentEmail1').val();
    var studentPhoneNumbe1 = $('.studentPhoneNumber1').val();
    var studentOldPassword = $('.studentOldPassword').val();
    var studentNewPassword = $('.studentNewPassword').val();

    //alert(studentId);

    let url = "/submitForgotAccount";
    axios.post(url,
    {
        studentId1:studentId1,
        studentEmail1:studentEmail1,
        studentPhoneNumbe1:studentPhoneNumbe1,
        studentOldPassword:studentOldPassword,
        studentNewPassword:studentNewPassword
    }


    ).then(
        res => {
            alert("success Change")
            window.location.href = "/StudentLogin";
        }).catch(err => {
            alert('Failed')
        console.log(err);


    });


})





$('.onLogin').click(function() {



    var studentId2 = $('.studentId2').val();
    var studentPaassword2 = $('.studentPaassword2').val();

    alert(studentPaassword2 + studentId2)

    let url = "/onLogin";
    axios.post(url, {
        studentId2: studentId2,
        studentPaassword2: studentPaassword2
    }).then(function(response) {
        if (response.status == 200 && response.data == 1) {
            alert('succes')
            $('.loginClass').addClass('d-none');
            $('.registrationClass').addClass('d-none');
            $('.profile').removeClass('d-none');
            window.location.href = "/"+studentId2+"";
        } else {
            alert('Failed')

        }
    }).catch(function(error) {

        alert('Failed')

    })
})
</script>

@endsection
