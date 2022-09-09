
<div class="stdForm1">


@extends('backend.Layout.app2')

@section('content')

<div class="container-fluid ">


    <div class="container">
        <div class="row">
            <div class="col-md-12 p-2 ">


                <div class="scroll1">


                <table  id="dataTable" class="table table-striped table-bordered display" >
                    <thead>
                    <tr>

                        <th class="th-sm">Name</th>
                        <th class="th-sm">ID</th>


                        <th class="th-sm">Phone</th>
                        <th class="th-sm">Transaction ID</th>

                        <th class="th-sm">Payment</th>

                    </tr>
                    </thead>

                    <tbody class="payment_table">




                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')
<script type="text/javascript">





    getStudentDataPaymentClear();



    //For Student Table
    function getStudentDataPaymentClear() {


        axios.get('/getStudentDataPaymentClear')
            .then(function(response) {
                //alert("Robin");

                if (response.status == 200) {

                    $('#dataTable').DataTable().destroy();

                    $('.payment_table').empty();


                    //alert("R")
                    var dataJSON = response.data;
                    //alert(dataJSON)
                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(


                            "<td>" + dataJSON[i].name + "</td>" +
                            "<td>" + dataJSON[i].student_id + "</td>" +


                            "<td>" + dataJSON[i].phone + "</td>" +
                            "<td>" + dataJSON[i].transaction_id + "</td>" +
                            "<td>" + dataJSON[i].status + "</td>"




                        ).appendTo('.payment_table');
                    });
                    $('#dataTable').DataTable({"order":false});
                    $('.dataTables_length').addClass('bs-select');
                }else{

                }

            })
            .catch(function(error) {



            });
    }


</script>


@endsection
