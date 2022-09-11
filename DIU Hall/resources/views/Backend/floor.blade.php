

{{--@extends('backend.Layout.app2')--}}
@extends('Backend.Layout.suppored')
@section('content')

<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 p-5 ">
  <button id="floorAdd" class="btn btn-danger my-3">Add New Floor</button>
<table id="dataTable" class="table table-striped table-bordered scroll">
  <thead>
    <tr>
      <th class="th-sm">Floor Photo</th>
      <th class="th-sm">Floor Name</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>

  <tbody class="floor_table">




  </tbody>
</table>
</div>
</div>
</div>


{{--    //Floor Add Modal--}}
<div class="modal fade" id="addFloorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Floor</h5>

            </div>
            <div class="modal-body  text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        <form>
                            <input id="FloorImg" type="file" id="" class="form-control mb-3" placeholder="Floor Photo">
                            <input id="FloorName" type="text" id="" class="form-control mb-3" placeholder="Floor Name">
                        </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">Cancel</button>
                <button  id="FloorAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>
{{--Floor Add End--}}
{{--    Floor Edit--}}
<div class="modal fade" id="EditFloorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Floor</h5>
                <h5 class="d-none" id="FloorUpdateID"></h5>

            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <h6 class="d-none" id="FloorEditID"></h6>

                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <input id="FloorEditImg" type="file" id="" class="form-control mb-3" placeholder="Floor Photo">
                                <input id="FloorEditName" type="text" id="" class="form-control mb-3" placeholder="Floor Name">
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-mdb-dismiss="modal">Cancel</button>
                <button  id="FloorEditUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>
{{--    Floor Edit End--}}


<!-- Floor Delete Modal -->
<div class="modal fade" id="deleteFloorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-2">Do You Want To Delete?</h5>
                <h6 class="mt-2 d-none" id="FloorDeleteID"></h6>
                <h5 class="mt-2 d-none" id="FloorDeleteImg"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-mdb-dismiss="modal">No</button>
                <a href="#" type="button" data-id="" id="FloorDeleteConfirmBtn"  class="btn btn-sm btn-primary">Yes</a>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script type="text/javascript">

getFloorData();



//For Floor Table
function getFloorData() {


axios.get('/getFloorDataAdmin')
    .then(function(response) {
        //alert("Robin");

        if (response.status == 200) {

            //$('#dataTable').DataTable().destroy();

            $('.floor_table').empty();



            var dataJSON = response.data;
            $.each(dataJSON, function(i, item) {
                $('<tr>').html(

                    "<td><img style='width: 90px' data-id="+item['id']+" class='imgOnRow' src="+item['floor_img']+"></td>"+
                    "<td>" + dataJSON[i].floor_name + "</td>" +

                    "<td><a class='floorEditBtn' data-id=" + dataJSON[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                    "<td ><a   class='floorDeleteBtn' data-img="+dataJSON[i].floor_img +"  data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"


                ).appendTo('.floor_table');
            });

            $('.floorEditBtn').click(function (){
                var id = $(this).data('id');

                // alert(id);
                $('#FloorEditID').html(id);

                 getEditFloorId(id);

                $('#EditFloorModal').modal('show');
            })


            $('.floorDeleteBtn').click(function (){

                var id = $(this).data('id');
                var imgLocation = $(this).data('img');




                $('#FloorDeleteID').html(id);
                $('#FloorDeleteImg').html(imgLocation);



                $('#deleteFloorModal').modal('show');
            })


            $('#dataTable').DataTable({"order":false});
            $('.dataTables_length').addClass('bs-select');


        }else{

        }

        })
          .catch(function(error) {



    });
}


$('#floorAdd').click(function (){

    $('#addFloorModal').modal('show');

})

$('#FloorAddConfirmBtn').click(function (){



    var FloorName = $('#FloorName').val();

    var MyFile = $('#FloorImg').prop('files')
    var MyFormData = new FormData();
    MyFormData.append('FileKey', MyFile[0]);
    MyFormData.append('FloorName', FloorName);

    if (FloorName.length == 0) {

        //toastr.error('Floor Name is Empty !');
         alert("Floor Name is Empty !")
    }
    else {
    axios.post('/floorAdd',MyFormData)


        .then(function(response) {
            console.log(response)
            if (response.status == 200) {

                if(response.data == 1){
                    alert("Floor Data is Successfully Added !")
                    getFloorData();
                    $('#addFloorModal').modal('hide');
                }else{
                    alert("Floor Data Failed !")
                    getFloorData();
                    $('#addFloorModal').modal('hide');
                }
                //toastr.success(' alert("Floor Name is Empty !").', {timeOut: 2000})


            } else {
                alert("Floor Data Failed !")
                getFloorData();
                $('#addFloorModal').modal('hide');

            }
        }).catch(function(error) {
       // toastr.warning('Floor Data Not Response.', {timeOut: 2000})
        alert("Floor Data Not Response!")
        getFloorData();
        $('#addFloorModal').modal('hide');
    })
    }

})





//Each Services Details
function getEditFloorId(EditID) {

    axios.post('/FloorEdit', {
        id: EditID
    })
        .then(function(response) {


            if (response.status == 200) {


                var jsonData = response.data;

                $('#FloorEditName').val(jsonData[0].floor_name);
                //alert(name);
               // $('#CourseDesUpdateId').val(jsonData[0].course_des);


            } else {

            }

        })
        .catch(function(error) {




        });

}


$('#FloorEditUpdateConfirmBtn').click(function (){
    var FloorName = $('#FloorEditName').val();
    var id = $('#FloorEditID').html();
    var MyFile = $('#FloorEditImg').prop('files')
    var MyFormData = new FormData();
    MyFormData.append('FileKey', MyFile[0]);
    MyFormData.append('FloorName', FloorName);
    MyFormData.append('id', id);

    if (FloorName.length == 0) {

        toastr.error('Floor Name is Empty !');

    }
    else {


    axios.post('/FloorEditUpdateConfirmBtn',MyFormData)


        .then(function(response) {
            if (response.status == 200) {
               if(response.data == 1){
                   alert("Floor Data Successfully Updated")
                   getFloorData();
                   $('#EditFloorModal').modal('hide');
               }else{
                   alert("Floor Data  Update Failed")
                   getFloorData();
                   $('#EditFloorModal').modal('hide');
               }


            } else {
                alert("Floor Data  Update Failed")
                getFloorData();
                $('#EditFloorModal').modal('hide');
            }
        }).catch(function(error) {
           // toastr.warning('Floor Data Update Not Response.', {timeOut: 2000})
            getFloorData();
            $('#EditFloorModal').modal('hide');
    })
    }
})

$('#FloorDeleteConfirmBtn').click(function (){
    var id = $('#FloorDeleteID').html();
   var img = $('#FloorDeleteImg').html();



    axios.post('/FloorDelete', {
        id: id,
        img: img
    })
        .then(function(response) {

            //alert(response.data);

            if (response.status == 200) {

                if (response.data == 1) {
                    //toastr.success('Floor Data Successfully Deleted.', {timeOut: 2000})
                    alert('Floor Data Successfully Deleted')
                    getFloorData();
                    $('#deleteFloorModal').modal('hide');




                } else {
                    alert('Floor Data Delete Failed')

                    getFloorData();
                }
            }else{
                alert('Floor Data Delete Failed')

                getFloorData();
            }



        })
        .catch(function(error) {

            //toastr.warning('Floor Data Delete Not Response.', {timeOut: 2000})
            alert('Floor Data Delete Failed')

            getFloorData();



        });
})

</script>


@endsection
