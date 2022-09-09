
<div class="container">
{{--<h1 id="floorIDbtn">f</h1>--}}
    <div class="row" id="floor">



    </div>

</div>


@section('script')



<script type="text/javascript">

getFloorData();

function getFloorData() {


axios.get('/getFloorData')
    .then(function(response) {
        //alert("Robin");

        if (response.status == 200) {
            //var TableElement = document.getElementById("service_table");


            $('#floor').empty();



            var dataJSON = response.data;
            $.each(dataJSON, function(i, item) {
                $('<div class="col-lg-4 col-md-8 col-sm-12"/>').html(
                  "<div class='card'>"+
                    "<img style='height:320px' data-id="+dataJSON[i].id+"   src=" + dataJSON[i].floor_img + " class='card-img-top img-fluid rounded-0' />"
                    +
                    "<span><a href='/unit/"+dataJSON[i].floor_name+"'   data-id=" +dataJSON[i].id+ " data-name=" +dataJSON[i].floor_name+ "   class='floorID btn btn-primary btn-block'> <h3  class='card-title text-center'>"+dataJSON[i].floor_name+"</h3></a></span>"






                ).appendTo('#floor');
            });



                $('.floorID').click(function() {
                  var id ;
                  floorName = $(this).data('name');
                  $('#floorIDbtn').html(floorName);

                //    unit();
                //    getUnitData(floorName);




            });



        } else {


        }


    }).catch(function(error) {

       alert("Error");

    });


}


function unit(){
    //console.log(floorName);
    axios.get('/unit')
    .then(function(response) {




        if (response.status == 200) {





            }





        else {

        }


    }).catch(function(error) {



    });
}





function getUnitData(floorName){
    //console.log(floorName);
    axios.post('/getUnitData',
    {
        floorName: floorName
    }

    )
    .then(function(response) {




        if (response.status == 200) {

            Unit(floorName);


            }





        else {

        }


    }).catch(function(error) {



    });
}



</script>
@endsection

