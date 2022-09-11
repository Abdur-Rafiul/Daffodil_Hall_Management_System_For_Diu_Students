{{--@extends('Backend.Layout.app2')--}}
@extends('Backend.Layout.suppored')

@section('content')

<div class="container-fluid p-5">
    <div class="row">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 border border-primary mt-5 text-center  ms-4">
              <h1 class="p-3">Total Floor</h1>
              <h2>{{ App\Models\FloorModel::count() }}</h2>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 border border-primary mt-5 text-center  ms-4">
              <h1 class="p-3 ">Total Unit</h1>
                <h2>{{ App\Models\unitModel::count() }}</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 border border-primary mt-5  text-center  ms-4">
              <h1 class="p-3">Total Student</h1>
                <h2>{{ App\Models\manyStudentModel::count() }}</h2>
            </div>





        </div>



        <div class="row charts">
                    <!-- bar chart Start-->
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <div class="mt-5" style="width:100%; height:100%">
                <div id="chartContainer"></div>
                </div>
            </div>
     </div>

    </div>

</div>

@endsection

@section('script')

<script type="text/javascript">
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	title: {
		text: "Column Chart in jQuery CanvasJS"
	},
	data: [
	{
		// Change type to "doughnut", "line", "splineArea", etc.
		type: "column",
		dataPoints: [
			{ label: "apple",  y: 10  },
			{ label: "orange", y: 15  },
			{ label: "banana", y: 25  },
			{ label: "mango",  y: 30  },
			{ label: "grape",  y: 28  }
		]
	}
	]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>
@endsection
