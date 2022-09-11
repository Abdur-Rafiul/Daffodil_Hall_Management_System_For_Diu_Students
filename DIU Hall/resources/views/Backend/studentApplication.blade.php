@extends('Backend.Layout.suppored')
<div class="stdForm1">


{{--@extends('backend.Layout.app2')--}}

@section('content')

<div class="container-fluid ">


    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <button id="floorAdd" class="btn btn-danger mt-1 addStudent mt-4"><a style="list-style-type: none!important;" class="text-white text-decoration-none" href="{{url('/studentApplicationForm')}}">Add Student</a></button>
                <div class="scroll1">


                <table  id="dataTable" class="table table-striped table-bordered display" >
                    <thead>
                    <tr>
                        <th class="th-sm">Photo</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">ID</th>
                        <th class="th-sm">Floor</th>
                        <th class="th-sm">Unit</th>
                        <th class="th-sm">View</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Option</th>

                    </tr>
                    </thead>

                    <tbody class="student_table">




                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>



    {{--    Student Edit--}}
    <div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Floor</h5>
                    <h5 class="d-none" id="StudentUpdateID"></h5>

                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <h6 class="d-none" id="StudentEditID"></h6>

                        <div class="row">

                                <div class="col-md-6 text-start">
                                    <label for="stdId">ID</label>
                                    <input class="w-100 p-2" type="text" id="stdId" name="stdId" placeholder="Enter Your Student ID">

                                    <label for="stdName">Name</label>
                                    <input class="w-100 p-2" type="text" id="stdName" name="stdName" placeholder="Enter Your Full Name">
                                    <div class="row">
                                        <diV class="col-md-4">
                                          <img class="img w-100 mt-3 mb-3" src="">
                                        </diV>
                                        <diV class="col-md-8">
                                            <label for="stdImg">Photo</label>
                                            <input  class='form-control fileInput w-100 p-2' type='file' id='formFile' name="fileInput">
                                        </diV>

                                    </div>
                                    <label for="FName">Father Name</label>
                                    <input class="w-100 p-2" type="text" id="FName" name="FName" placeholder="Enter Your Father Name">
                                    <label  for="FContact">Father Contact</label>
                                    <input class="w-100 p-2" type="text" id="FContact" name="FContact" placeholder="Enter Your Father Contact">
                                    <label for="MName">Mother Name</label>
                                    <input class="w-100 p-2" type="text" id="MName" name="MName" placeholder="Enter Your Mother Name">
                                    <label  for="MContact">Mother Contact</label>
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


                                </div>

                                  <div class="col-md-6 text-start">

                                      <label for="stdProfession">Profession</label>
                                      <input class="w-100 p-2" type="text" id="stdProfession" name="stdProfession"
                                             placeholder="Please Enter Your Profession Here">
                                    <label for="stdPhone">Student Phone</label>
                                    <input class="w-100 p-2" type="text" id="stdPhone" name="stdPhone" placeholder="Enter Your Phone Number">
                                    <label for="stdEmail">Student Email</label>
                                    <input class="w-100 p-2" type="text" id="stdEmail" name="stdEmail" placeholder="Enter Your Email">
                                    <label for="stdUniversity">Student University</label>
                                    <input  class="w-100 p-2" type="text" id="stdUniversity" name="stdUniversity" placeholder="Your University Name">
                                    <label for="stdDob">Student DOB </label>
                                    <input class="w-100 p-2" type="text" id="stdDob" name="stdDob" placeholder="Your Date">



                                    <label for="permanentDes">Student Permanent Address</label>
                                    <textarea class="w-100 p-2" id="permanentDes" placeholder="Your Permanent Address"></textarea>

                                    <label for="presentDes">Student Present Address </label>
                                    <textarea class="w-100 p-2" id="presentDes" placeholder="Your Present Address"></textarea>



                                     <label class="p-2 bg-info text-white mt-3 mb-2">Permission of Seat</label>



                                </form>

                            </div>
                </div>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button style="font-size: 30px" type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">Cancel</button>
                    <button style="font-size: 30px"  id="StudentEditUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    {{--    Student Edit End--}}

        <!-- View Modal -->
        <div class="modal fade" id="ViewStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body p-3 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-start">
                                    <div class="col-md-12">
                                        <h5 class="d-none" id="StudentEditViewID"></h5>
                                        <img class="fileInput1 img w-100" src="">
                                    </div>
                                    <div class="p-2">
                                        <h3>Name: <span id="stdName1"></span></h3>
                                        <h3>Name: <span id="stdUniversity1"></span></h3>
                                        <h3>Name: <span id="stdPhone1"></span></h3>
                                        <h3>Name: <span id="floorid3"></span></h3>
                                        <h3>Name: <span id="unitId4"></span></h3>
                                        <h3>Name: <span id="permanentDes1"></span></h3>
                                    </div>

                                        <div class="col-md-4"> </div>
                                        <div class="col-md-8 me-auto">

                                            <label style="font-size: 30px" class="mt-2 mb-2 bg-danger text-dark p-2">Permission</label>
                                           <select class="w-100 p-2" id="permission">
                                               <option>Pending</option>
                                               <option>Accept</option>
                                               <option>Delete</option>
                                           </select>

                                        </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-mdb-dismiss="modal">No</button>
                        <a href="#" type="button" data-id="" id="viewStudentConfirm"  class="btn btn-sm btn-primary">Confirm</a>
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

                   // var dataJSON = null;

                    var dataJSON = response.data;
                    $.each(dataJSON, function(i, item) {

                        $('.unitId').append($('<option>',
                            {

                                value: i,
                                text : dataJSON[i].unit_name
                            }))

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


    getStudentData();



    //For Student Table
    function getStudentData() {


        axios.get('/submitedData')
            .then(function(response) {
                //alert("Robin");

                if (response.status == 200) {

                    $('#dataTable').DataTable().destroy();

                    $('.student_table').empty();



                    var dataJSON = response.data;
                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(

                            "<td><img style='width: 90px' data-id="+item['id']+" class='imgOnRow' src="+item['student_img']+"></td>"+
                            "<td>" + dataJSON[i].student_name + "</td>" +
                            "<td>" + dataJSON[i].student_id + "</td>" +
                            "<td>" + dataJSON[i].floor_name + "</td>" +
                            "<td>" + dataJSON[i].unit_name + "</td>" +

                            "<td><a class='studentView' data-id=" + dataJSON[i].id + " ><i class='fa-solid fa-eye'></i></a></td>" +
                            "<td><a class='studentEdit' data-id=" + dataJSON[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                            "<td ><a class='studentOption'   data-id=" + dataJSON[i].id + ">"+dataJSON[i].admin_permission +"</a></td>"


                        ).appendTo('.student_table');
                    });

                    $('.studentEdit').click(function (){
                        var id = $(this).data('id');

                        // alert(id);
                        $('#StudentEditID').html(id);

                        getEditStudentId(id);

                        $('#EditStudentModal').modal('show');
                    })

                   $('.studentView').click(function (){
                       var id = $(this).data('id');

                       $('#StudentEditViewID').html(id);

                       getStudentViewId(id);

                       $('#ViewStudentModal').modal('show');
                   })

                    $('#dataTable').DataTable({"order":false});
                    $('.dataTables_length').addClass('bs-select');
                }else{

                }

            })
            .catch(function(error) {



            });
    }



//student View

    function  getStudentViewId(EditID) {

        axios.post('/StudentEditAdmin', {
            id: EditID
        })
            .then(function(response) {


                if (response.status == 200) {


                    var jsonData = response.data;

                    $.each(jsonData, function(i, item) {


                        $('.stdId1').html(jsonData[i].student_id);
                        //alert(name);
                        $('#stdName1').html(jsonData[i].student_name);



                        $("#floorid3").html(jsonData[i].floor_name);






                        $("#unitId4").html(jsonData[i].unit_name);
                        $('#stdPhone1').html(jsonData[i].student_phone);
                        $('#stdUniversity1').html(jsonData[i].student_university);

                        $('#permanentDes1').html(jsonData[i].student_permanentAddress);
                        $('.img').attr("src", jsonData[i].student_img)

                    });




                } else {

                }

            })
            .catch(function(error) {




            });

    }

//Student View Confirm
    $('#viewStudentConfirm').click(function (){
      var id =  $('#StudentEditViewID').html();

      axios.post('/StudentEditAdmin', {
          id: id
      })
          .then(function(response) {


              if (response.status == 200) {

                  var jsonData = response.data;
                  $.each(jsonData, function(i, item) {


                  var stdId = jsonData[i].student_id;
                  //alert(name);
                  var stdName = jsonData[i].student_name;


                  var FName = jsonData[i].student_fatherName ;
                  var FContact = jsonData[i].student_fatherContact;
                  var MName = jsonData[i].student_motherName;
                  var MContact = jsonData[i].student_motherContact;



                  var selectedDataFloor = jsonData[i].floor_name;






                  var selectedDataUnit = jsonData[i].unit_name;
                  var stdProfession = jsonData[i].profession;
                  var stdDes = jsonData[i].student_des;


                  var stdAge = jsonData[i].student_age;
                  var stdPhone = jsonData[i].student_phone;
                  var stdEmail = jsonData[i].student_email;
                  var stdUniversity = jsonData[i].student_university;
                  var stdDob = jsonData[i].DOB;

                  var permanentDes = jsonData[i].student_presentAddress;
                  var presentDes = jsonData[i].student_permanentAddress;
                  var MyFile = jsonData[i].student_img;


                  var permission = $("#permission option:selected").text();
                 // alert(permission)

                  var MyFormData = new FormData();
                  MyFormData.append('FileKey', MyFile);
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

                  if(permission == "Accept") {


                      axios.post('/submit1', MyFormData)


                          .then(function (response) {
                              if (response.status == 200) {
                                  if (response.data == 1) {

                                      alert('Student Data is Permission Success')
                                      getStudentData();

                                      $('#ViewStudentModal').modal('hide');
                                  } else {


                                      alert('Student Data is Permission Faild')
                                      getStudentData();

                                      $('#ViewStudentModal').modal('hide');
                                  }


                              } else {
                                  alert('Student Data is Permission Faild')
                                  getStudentData();

                                  $('#ViewStudentModal').modal('hide');
                              }
                          }).catch(function (error) {
                          alert('Student Data is Permission Faild')
                          getStudentData();

                          $('#ViewStudentModal').modal('hide');
                      })
                  }else if(permission == 'Delete'){
                      axios.post('/submitDelete', MyFormData)


                          .then(function (response) {
                              if (response.status == 200) {
                                  if (response.data == 1) {

                                      alert('Student Delete  Permission')
                                      getStudentData();

                                      $('#ViewStudentModal').modal('hide');
                                  } else {

                                      alert('Student Delete Faild')
                                      getStudentData();

                                      $('#ViewStudentModal').modal('hide');
                                  }


                              } else {
                                  alert('Student Delete Faild')
                                  getStudentData();

                                  $('#ViewStudentModal').modal('hide');
                              }
                          }).catch(function (error) {
                          alert('Student Delete Faild')
                          getStudentData();

                          $('#ViewStudentModal').modal('hide');
                      })
                  }else{

                      $('#ViewStudentModal').modal('hide');
                  }
                  })
              }


              else {

              }

          })
          .catch(function(error) {




          });

    })

    //Student Edit
    function  getEditStudentId(EditID) {

        axios.post('/StudentEditAdmin', {
            id: EditID
        })
            .then(function(response) {


                if (response.status == 200) {


                    var jsonData = response.data;
                    $.each(jsonData, function(i, item) {

                        var stdId = $('#stdId').val(jsonData[i].student_id);
                        //alert(name);
                        var stdName = $('#stdName').val(jsonData[i].student_name);


                        var FName = $('#FName').val(jsonData[i].student_fatherName);
                        var FContact = $('#FContact').val(jsonData[i].student_fatherContact);
                        var MName = $('#MName').val(jsonData[i].student_motherName);
                        var MContact = $('#MContact').val(jsonData[i].student_motherContact);


                        var selectedDataFloor = $("#floorid2").html(jsonData[i].floor_name);


                        var selectedDataUnit = $(".unitId2").html(jsonData[i].unit_name);
                        var stdProfession = $('#stdProfession').val(jsonData[i].profession);
                        var stdDes = $('#stdDes').val(jsonData[i].student_des);


                        var stdAge = $('#stdAge').val(jsonData[i].student_age);
                        var stdPhone = $('#stdPhone').val(jsonData[i].student_phone);
                        var stdEmail = $('#stdEmail').val(jsonData[i].student_email);
                        var stdUniversity = $('#stdUniversity').val(jsonData[i].student_university);
                        var stdDob = $('#stdDob').val(jsonData[i].DOB);

                        var permanentDes = $('#permanentDes').val(jsonData[i].student_presentAddress);
                        var presentDes = $('#presentDes').val(jsonData[i].student_permanentAddress);
                        var MyFile = $('.img').attr("src", jsonData[i].student_img)
                        var permission = $('.permission option:selected').text(jsonData[i].admin_permission);

                    })

                } else {

                }

            })
            .catch(function(error) {




            });

    }


    $('#StudentEditUpdateConfirmBtn').click(function() {

        var stdId = $('#stdId').val();
        //alert(name);
        var stdName = $('#stdName').val();


        var FName = $('#FName').val();
        var FContact = $('#FContact').val();
        var MName = $('#MName').val();
        var MContact = $('#MContact').val();


        var selectedDataFloor = $("#floor option:selected").text();
        var permission = 'Pending';


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
        MyFormData.append('permission', permission);



            axios.post('/submit', MyFormData)


                .then(function (response) {
                    if (response.status == 200) {
                        if(response.data == 1){
                            alert('Student Data Successfully Update')
                            getStudentData();

                            $('#EditStudentModal').modal('hide');
                        }else{
                            alert('Student Data Update Failed')
                            getStudentData();

                            $('#EditStudentModal').modal('hide');
                        }


                    } else {
                        alert('Student Data Update Failed')
                        getStudentData();

                        $('#EditStudentModal').modal('hide');
                    }
                }).catch(function (error) {
                alert('Student Data Update Failed')
                getStudentData();

                $('#EditStudentModal').modal('hide');
            })


    })






</script>


@endsection
