
<div class="stdForm">
{{--@extends('backend.Layout.app2')--}}
    @extends('Backend.Layout.suppored')
@section('content')


    <div class="container-fluid scroll">
        <div class="studentApplication">
            <h3>Please Fill Up This Form</h3>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-12  bg-light p-5">
                    <form>
                        <label for="stdId">ID</label>
                        <input class="w-100 p-2" type="text" id="stdId" name="stdId" placeholder="Enter Your Student ID">

                        <label for="stdName">Name</label>
                        <input class="w-100 p-2" type="text" id="stdName" name="stdName" placeholder="Enter Your Full Name">
                        <label  for="stdImg">Photo</label>
                        <input  class='form-control fileInput' type='file' id='formFile' name="fileInput">
                        <label for="FName">Father Name</label>
                        <input class="w-100 p-2" type="text" id="FName" name="FName" placeholder="Enter Your Father Name">
                        <label for="FContact">Father Contact</label>
                        <input class="w-100 p-2" type="text" id="FContact" name="FContact" placeholder="Enter Your Father Contact">
                        <label for="MName">Mother Name</label>
                        <input class="w-100 p-2" type="text" id="MName" name="MName" placeholder="Enter Your Mother Name">
                        <label for="MContact">Mother Contact</label>
                        <input class="w-100 p-2" type="text" id="MContact" name="MContact" placeholder="Enter Your Mother Contact">


                        <label for="floor">Floor Name</label>
                        <select class="w-100 p-2" name="floor" id="floor">
                            @foreach($floorName as $floorName)
                                <option id="text" data-id="123">{{$floorName['floor_name']}}</option>
                            @endforeach
                        </select>

                        <form>
                        <label for="unit">Unit Name</label>



                             <select class="unitId w-100 p-2">

                             </select>




                        </form>

                        <label for="stdProfession">Profession</label>
                        <input class="w-100 p-2" type="text" id="stdProfession" name="stdProfession"
                               placeholder="Please Enter Your Profession Here">
                        <label for="stdDes">Student Description</label>
                        <textarea class="w-100 p-2" id="stdDes" placeholder="Enter Your Sort Description"></textarea>
                        <label for="stdAge">Student Age</label>
                        <input class="w-100 p-2" type="text" id="stdAge" name="stdAge" placeholder="Enter Your Age">
                        <label for="stdPhone">Student Phone</label>
                        <input  class="w-100 p-2" type="text" id="stdPhone" name="stdPhone" placeholder="Enter Your Phone Number">
                        <label for="stdEmail">Student Email</label>
                        <input class="w-100 p-2" type="text" id="stdEmail" name="stdEmail" placeholder="Enter Your Email">
                        <label for="stdUniversity">Student University</label>
                        <input class="w-100 p-2" type="text" id="stdUniversity" name="stdUniversity" placeholder="Your University Name">
                        <label for="stdDob">Student DOB </label>
                        <input class="w-100 p-2" type="date" id="stdDob" name="stdDob" placeholder="dd-mm-yyyy" value=""
                               min="1997-01-01" max="2030-12-31">



                        <label for="permanentDes">Student Permanent Address</label>
                        <textarea class="w-100 p-2" id="permanentDes" placeholder="Your Permanent Address"></textarea>

                        <label for="presentDes">Student Present Address </label>
                        <textarea class="w-100 p-2" id="presentDes" placeholder="Your Present Address"></textarea>





                        <input style="font-size: 30px" class="btn btn-primary mt-2" id="submitfromAdmin" type="submit" value="Submit">
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>


        </div>
    </div>

</div>
@endsection

@section('script')

    <script type="text/javascript">

         $('.text').empty();

         $('#floor').change(function() {

            let text = $( "#floor option:selected" ).text();

            axios.post('/floorToUnit',{
                    text: text
            })


                .then(function(response) {
                    if (response.status == 200) {

                        $('.unitId').empty();

                       var dataJSON = null;

                         dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {

                                $('.unitId').append($('<option>',
                                    {
                                        value: i,
                                        text : dataJSON[i].unit_name
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

        $('#submitfromAdmin').click(function() {

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
            var permission = "Pending";

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
            MyFormData.append('permission', permission);



            axios.post('/submitFromAdmin',MyFormData)


                .then(function(response) {
                    if (response.status == 200) {
                        if(response.data == 1){
                         alert('Student Data is Successfully Added.')
                        window.location.href="/studentApplication";
                        }else{

                            alert('Student Data is Failed.')
                           // window.location.href="/studentApplication";
                        }


                    } else {
                        alert('Student Data is Failed.')
                        //window.location.href="/studentApplication";
                    }
                }).catch(function(error) {
                alert('Student Data is Failed.')
                //window.location.href="/studentApplication";
            })

        })

</script>
@endsection
