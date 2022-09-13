@extends('frontend.Layout.app')

@section('content')
    <div class="container-fluid">
        <div class="studentApplication">

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8  bg-light p-5">
                    <h3>Please Fill Up This Form</h3>
                    <form class="needs-validation">





                        <label for="stdId">ID</label>
                        <input required class="w-100 p-3" type="text" id="stdId" name="stdId"
                            placeholder="Enter Your Student ID">

                        <label for="stdName">Name</label>
                        <input class="w-100 p-3" type="text" id="stdName" name="stdName"
                            placeholder="Enter Your Full Name">
                        <label for="stdImg">Photo</label>
                        <input class='form-control fileInput' type='file' id='formFile' name="fileInput">
                        <label for="FName">Father Name</label>
                        <input class="w-100 p-3" type="text" id="FName" name="FName"
                            placeholder="Enter Your Father Name">
                        <label class="w-100 p-3" for="FContact">Father Contact</label>
                        <input class="w-100 p-3" type="text" id="FContact" name="FContact"
                            placeholder="Enter Your Father Contact">
                        <label for="MName">Mother Name</label>
                        <input class="w-100 p-3" type="text" id="MName" name="MName"
                            placeholder="Enter Your Mother Name">
                        <label for="MContact">Mother Contact</label>
                        <input class="w-100 p-3" type="text" id="MContact" name="MContact"
                            placeholder="Enter Your Mother Contact">


                        <label for="floor">Floor Name</label>
                        <select name="floor" id="floor" class="w-100 p-3">
                            @foreach ($floorName as $floorName1)
                                <option id="text" data-id="123">{{ $floorName1['floor_name'] }}</option>
                            @endforeach
                        </select>

                        <form>
                            <label for="unit">Unit Name</label>



                            <select class="unitId w-100 p-3">

                            </select>




                        </form>

                        <label for="stdProfession">Profession</label>
                        <input class="w-100 p-3" type="text" id="stdProfession" name="stdProfession"
                            placeholder="Please Enter Your Profession Here">
                        <label for="stdDes">Student Description</label>
                        <textarea class="w-100 p-3" id="stdDes" placeholder="Enter Your Sort Description"></textarea>
                        <label for="stdAge">Student Age</label>
                        <input class="w-100 p-3" type="text" id="stdAge" name="stdAge" placeholder="Enter Your Age">
                        <label for="stdPhone">Student Phone</label>
                        <input class="w-100 p-3" type="text" id="stdPhone" name="stdPhone"
                            placeholder="Enter Your Phone Number">
                        <label for="stdEmail">Student Email</label>
                        <input class="w-100 p-3" type="text" id="stdEmail" name="stdEmail"
                            placeholder="Enter Your Email">
                        <label for="stdUniversity">Student University</label>
                        <input class="w-100 p-3" type="text" id="stdUniversity" name="stdUniversity"
                            placeholder="Your University Name">
                        <label for="stdDob">Student DOB </label>
                        <input class="w-100 p-3" type="date" id="stdDob" name="stdDob" placeholder="dd-mm-yyyy"
                            value="" min="1997-01-01" max="2030-12-31">



                        <label for="permanentDes">Student Permanent Address</label>
                        <textarea class="w-100 p-3" id="permanentDes" placeholder="Your Permanent Address"></textarea>

                        <label for="presentDes">Student Present Address </label>
                        <textarea class="w-100 p-3" id="presentDes" placeholder="Your Present Address"></textarea>





                        <input style="font-size: 30px" class="btn btn-primary mt-3" id="submitfromAdmin1" type="submit"
                            value="Submit">
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('.text').empty();

        $('#floor').change(function() {

            let text = $("#floor option:selected").text();

            axios.post('/floorToUnit', {
                    text: text
                })


                .then(function(response) {

                    if (response.status == 200) {

                        $('.unitId').empty();

                        var dataJSON;

                        dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {

                            $('.unitId').append($('<option>', {
                                value: i,
                                text: dataJSON[i].unit_name
                            }));

                        });
                        //lert(dataJSON)
                        // for (let i = 0; i < dataJSON.length; i++)
                        // {
                        //     $('.unitId').append($('<option>',
                        //         {
                        //             value: i,
                        //             text : dataJSON[i].unit_name
                        //         }));
                        // }

                    } else {
                        //lert("error")
                    }
                }).catch(function(error) {
                    //alert("error");
                })


        });

        $('#submitfromAdmin1').click(function() {

            var stdId = $('#stdId').val();
            //alert(name);
            var stdName = $('#stdName').val();


            var FName = $('#FName').val();
            var FContact = $('#FContact').val();
            var MName = $('#MName').val();
            var MContact = $('#MContact').val();



            var selectedDataFloor = $("#floor option:selected").text();






            var selectedDataUnit = $(".unitId option:selected").text();
            var stdProfession = $('#stdProfession').val();
            var stdDes = $('#stdDes').val();


            var stdAge = $('#stdAge').val();
            var stdPhone = $('#stdPhone').val();
            var stdEmail = $('#stdEmail').val();
            var stdUniversity = $('#stdUniversity').val();
            var stdDob = $('#stdDob').val();

            var permanentDes = $('#permanentDes').val();
            var presentDes = $('#presentDes').val();
            var MyFile = $('.fileInput').prop('files')
            var MyFormData = new FormData();
            MyFormData.append('FileKey', MyFile[0]);
            MyFormData.append('presentDes', presentDes);
            MyFormData.append('permanentDes', permanentDes);
            MyFormData.append('stdDob', stdDob);
            MyFormData.append('stdUniversity', stdUniversity);
            MyFormData.append('stdEmail', stdEmail);
            MyFormData.append('stdPhone', stdPhone);
            MyFormData.append('stdPhone', stdPhone);
            MyFormData.append('stdAge', stdAge);
            MyFormData.append('stdDes', stdDes);
            MyFormData.append('stdProfession', stdProfession);
            MyFormData.append('selectedDataUnit', selectedDataUnit);
            MyFormData.append('selectedDataFloor', selectedDataFloor);
            MyFormData.append('MContact', MContact);
            MyFormData.append('MName', MName);
            MyFormData.append('FContact', FContact);
            MyFormData.append('FName', FName);
            MyFormData.append('stdName', stdName);
            MyFormData.append('stdId', stdId);



            axios.post('/submitFromAdmin1', MyFormData)


                .then(function(response) {
                    console.log(response)
                    if (response.status == 200) {
                        if (response.data == 1) {
                            alert("Student Data is Successfully Added.")
                            window.location.href = "/";
                            // toastr.success('Student Data is Successfully Added.', {timeOut: 2000})

                        } else {
                            alert("Student Data is Added Failed.")
                        }

                        // window.location.href="/";

                        //toastr.success('Student Data is Already Token.', {timeOut: 5000})




                    } else {


                    }
                }).catch(function(error) {
                    //toastr.success('Student Data is Already Token.', {timeOut: 5000})
                    //window.location.href="/";
                    alert("1")
                })
        })
    </script>
@endsection
