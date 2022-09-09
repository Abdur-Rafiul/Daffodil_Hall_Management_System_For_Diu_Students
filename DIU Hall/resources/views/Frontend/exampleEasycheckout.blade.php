<div class="">
@extends('Frontend.Layout.app')

</div>
@section('content')


<div class="container">
    <div class="py-5 text-center">
        <h2>Please Payment</h2>

        <p class="lead">Pray regularly. Brighten the face of parents and the face of the country by studying well</p>
    </div>

    <div class="row">
        <div class="col-md-5 order-md-2 ">

            <img class="w-100 imgpayment" src="\Frontend\images\bank-transfer.png" alt="" srcset="">
        </div>
        <div class="col-md-6 order-md-1 me-5">
            <h4 class="mb-3">Rahat Villa Payment Method</h4>
            <form method="POST" class="needs-validation" novalidate>

                <div class="row">

                    <h3 id="month">{{($date)}} Month</h3>

                    @foreach($student as $student)

                    <div class="col-md-12 mb-3">


                        <label for="firstName">Full name</label>

                        <input type="text" name="customer_name" class="form-control" id="customer_name"
                            placeholder="Enter Your Full Name" value="{{($student['student_name'])}}" required>

                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="ID">Student ID</label>

                        <input type="text" name="customer_id" class="form-control" id="customer_id"
                            placeholder="Enter Your Full Name" value="{{($student['student_id'])}}" required>

                        <div class="invalid-feedback">
                            Valid Student id is required.
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="Amount">Amount</label>

                        <input type="text" name="customer_amount" class="form-control" id="amount"
                            placeholder="Amount" value="2500" required>

                        <div class="invalid-feedback">
                            Valid Amount is required.
                        </div>
                    </div>




                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text mt-2">+88</span>
                    </div>  
                        <input type="text" name="customer_mobile" class="form-control mt-2" id="customer_mobile"
                            placeholder="Enter Your Full Name" value="{{($student['student_phone'])}}" required>

                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>

                    <input type="text" name="customer_email" class="form-control" id="customer_email"
                        placeholder="Enter Your Full Name" value="{{($student['student_email'])}}" required>

                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>

                    <input type="text" name="customer_address" class="form-control" id="customer_address"
                        placeholder="Enter Your Full Name" value="{{($student['student_permanentAddress'])}}" required>

                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>


              @endforeach
                </div>





                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn" type="submit"
                    token="if you have any token validation"
                    postdata="your javascript arrays or objects which requires in backend"
                    order="If you already have the transaction generated for current order"
                    endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>
        </div>
    </div>


</div>


@endsection


@section('script')
<!-- If you want to use the popup integration, -->
<script>
var obj = {};
obj.cus_name = $('#customer_name').val();
obj.cus_id = $('#customer_id').val();
obj.cus_phone = $('#customer_mobile').val();
obj.cus_email = $('#customer_email').val();
obj.cus_add1 = $('#customer_address').val();
obj.amount = $('#amount').val();
obj.month = $('#month').html();




$('#sslczPayBtn').prop('postdata', obj);

(function(window, document) {
    var loader = function() {
        var script = document.createElement("script"),
            tag = document.getElementsByTagName("script")[0];
        // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
        script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
        7); // USE THIS FOR SANDBOX
        tag.parentNode.insertBefore(script, tag);
    };

    window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
</script>

@endsection
