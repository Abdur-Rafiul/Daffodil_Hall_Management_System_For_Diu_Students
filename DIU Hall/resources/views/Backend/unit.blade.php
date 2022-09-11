{{--@extends('backend.Layout.app2')--}}
@extends('Backend.Layout.suppored')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <button id="UnitAdd" class="btn btn-danger my-3">Add New Unit</button>
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="th-sm">Unit Photo</th>
                        <th class="th-sm">Unit Name</th>
                        <th class="th-sm">Floor Name</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>

                    <tbody class="Unit_table">




                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{--    //Unit Add Modal--}}
    <div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Unit</h5>

                </div>
                <div class="modal-body  text-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <form>
                                    <input id="UnitImg" type="file" id="" class="form-control mb-3" placeholder="Unit Photo">
                                    <input id="UnitName" type="text" id="" class="form-control mb-3" placeholder="Unit Name">
                                    <h4 class="text-start">Floor Name</h4>
                                    <select class="w-100 p-2 text-start" name="floor" id="floor">

                                        @foreach($floorName as $floorName1)
                                            <option data-id="123">{{$floorName1['floor_name']}}</option>
                                        @endforeach
                                    </select>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">Cancel</button>
                    <button  id="UnitAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{--Unit Add End--}}
    {{--    Unit Edit--}}
    <div class="modal fade" id="EditUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Unit</h5>
                    <h5 id="UnitUpdateID"></h5>

                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <h6 class="d-none" id="UnitEditID"></h6>

                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <input id="UnitEditImg" type="file" id="" class="form-control mb-3" placeholder="Unit Photo">
                                    <input id="UnitEditName" type="text" id="" class="form-control mb-3" placeholder="Unit Name">
                                    <h4 class="text-start">Floor Name</h4>
                                    <select class="w-100 p-2" name="floor" id="floor">
                                        @foreach($floorName as $floorName)
                                            <option data-id="123">{{$floorName['floor_name']}}</option>
                                        @endforeach
                                    </select>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">Cancel</button>
                    <button  id="UnitEditUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{--    Unit Edit End--}}


    <!-- Unit Delete Modal -->
    <div class="modal fade" id="deleteUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body p-3 text-center">
                    <h5 class="mt-2">Do You Want To Delete?</h5>
                    <h6 class="mt-2 d-none" id="UnitDeleteID"></h6>
                    <h5 class="mt-2 d-none" id="UnitDeleteImg"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-mdb-dismiss="modal">No</button>
                    <a href="#" type="button" data-id="" id="UnitDeleteConfirmBtn"  class="btn btn-sm btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script type="text/javascript">

        getUnitData();



        //For Unit Table
        function getUnitData() {


            axios.get('/getUnitDataAdmin')
                .then(function(response) {
                    //alert("Robin");

                    if (response.status == 200) {

                        //$('#dataTable').DataTable().destroy();

                        $('.Unit_table').empty();



                        var dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(

                                "<td><img style='width: 90px' data-id="+item['id']+" class='imgOnRow' src="+item['unit_img']+"></td>"+
                                "<td>" + dataJSON[i].unit_name + "</td>" +
                                "<td>" + dataJSON[i].floor_name + "</td>" +

                                "<td><a class='UnitEditBtn' data-id=" + dataJSON[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                                "<td ><a   class='UnitDeleteBtn' data-img="+dataJSON[i].unit_img +"  data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"


                            ).appendTo('.Unit_table');
                        });

                        $('.UnitEditBtn').click(function (){
                            var id = $(this).data('id');

                            // alert(id);
                            $('#UnitEditID').html(id);

                            getEditUnitId(id);

                            $('#EditUnitModal').modal('show');
                        })


                        $('.UnitDeleteBtn').click(function (){

                            var id = $(this).data('id');
                            var imgLocation = $(this).data('img');




                            $('#UnitDeleteID').html(id);
                            $('#UnitDeleteImg').html(imgLocation);



                            $('#deleteUnitModal').modal('show');
                        })
                        $('#dataTable').DataTable({"order":false});
                        $('.dataTables_length').addClass('bs-select');
                    }else{

                    }

                })
                .catch(function(error) {



                });
        }


        $('#UnitAdd').click(function (){

            $('#addUnitModal').modal('show');

        })

        $('#UnitAddConfirmBtn').click(function (){



            var UnitName = $('#UnitName').val();
            var UnitFloorName = $("#floor option:selected").text();


            var MyFile = $('#UnitImg').prop('files')
            var MyFormData = new FormData();
            MyFormData.append('FileKey', MyFile[0]);
            MyFormData.append('UnitName', UnitName);
            MyFormData.append('UnitFloorName', UnitFloorName);

            if (UnitName.length == 0) {

                //toastr.error('Unit Name is Empty !');
                alert("Unit Name is Empty !")

            }
            else {
                axios.post('/UnitAdd',MyFormData)


                    .then(function(response) {
                        if (response.status == 200) {
                            if(response.data == 1){
                              alert('Unit Data is Successfully Added')
                                getUnitData();

                                $('#addUnitModal').modal('hide');
                            }else{
                                alert('Unit Data is Failed')
                                getUnitData();

                                $('#addUnitModal').modal('hide');
                            }


                        } else {
                            alert('Unit Data is Successfully Added')
                            getUnitData();

                            $('#addUnitModal').modal('hide');
                        }
                    }).catch(function(error) {
                    alert('Unit Data Not Response')
                    getUnitData();

                    $('#addUnitModal').modal('hide');
                })
            }

        })





        //Each Services Details
        function getEditUnitId(EditID) {

            axios.post('/UnitEdit', {
                id: EditID
            })
                .then(function(response) {


                    if (response.status == 200) {


                        var jsonData = response.data;

                        $('#UnitEditName').val(jsonData[0].unit_name);
                       // $('#UnitEditFloorName').val(jsonData[0].floor_name);



                    } else {

                    }

                })
                .catch(function(error) {




                });

        }


        $('#UnitEditUpdateConfirmBtn').click(function (){
            var UnitName = $('#UnitEditName').val();
            var UnitEditFloorName = $("#floor option:selected").text();

            var id = $('#UnitEditID').html();
            var MyFile = $('#UnitEditImg').prop('files')
            var MyFormData = new FormData();
            MyFormData.append('FileKey', MyFile[0]);
            MyFormData.append('UnitName', UnitName);
            MyFormData.append('UnitEditFloorName', UnitEditFloorName);
            MyFormData.append('id', id);

            if (UnitName.length == 0) {

               alert('Unit Name is Empty !');

            }
            else {


                axios.post('/UnitEditUpdateConfirmBtn',MyFormData)


                    .then(function(response) {
                        if (response.status == 200) {

                            if(response.data == 1){
                                alert('Unit Data Successfully Updated.')
                                getUnitData();
                                $('#EditUnitModal').modal('hide');
                            }else{
                                alert('Unit Data Update Failed.')
                                getUnitData();
                                $('#EditUnitModal').modal('hide');
                            }
                            //alert(response.data)

                        } else {
                            alert('Unit Data Update Failed.')
                            getUnitData();
                            $('#EditUnitModal').modal('hide');
                        }
                    }).catch(function(error) {
                    alert('Unit Data Update Failed.')
                    getUnitData();
                    $('#EditUnitModal').modal('hide');
                })
            }
        })

        $('#UnitDeleteConfirmBtn').click(function (){
            var id = $('#UnitDeleteID').html();
            var img = $('#UnitDeleteImg').html();



            axios.post('/UnitDelete', {
                id: id,
                img: img
            })
                .then(function(response) {

                    //alert(response.data);

                    if (response.status == 200) {

                        if (response.data == 1) {
                            alert('Unit Data Successfully Deleted.')
                            getUnitData();
                            $('#deleteUnitModal').modal('hide');




                        } else {

                            alert('Unit Data Successfully Deleted.')
                            getUnitData();
                            $('#deleteUnitModal').modal('hide');
                        }
                    }



                })
                .catch(function(error) {
                    alert('Unit Data Successfully Deleted.')
                    getUnitData();
                    $('#deleteUnitModal').modal('hide');



                });
        })

    </script>


@endsection
