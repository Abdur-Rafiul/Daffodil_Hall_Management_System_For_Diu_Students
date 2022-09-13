@extends('Frontend.Layout.app')
@section('content')
    <div class="container mt-5 text-center">
        <div class="row">
            <h3 class="floorSet mt-5 mb-5"></h3>
            @foreach ($floorName as $floorName)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card ">
                        <img style="height:12rem;" src="{{ asset($floorName['unit_img']) }}"
                            class="card-img-top img-fluid rounded-0" alt="Fissure in Sandstone" />
                        <div class="card--body">
                            <div class="card-title  mt-2">

                                <h3 class="floorName d-none">{{ $floorName['floor_name'] }}</h3>
                                <a href="/unit/{{ $floorName['floor_name'] }}/{{ $floorName['unit_name'] }}"
                                    class="btn btn-primary btn-block">
                                    <h3 data-name="{{ $floorName['unit_name'] }}" class="unitName">
                                        {{ $floorName['unit_name'] }}</h3>
                                </a>

                            </div>


                        </div>
                    </div>



                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        let floorName = $('.floorName').html();
        $('.floorSet').html(floorName);

        //  $('.unitName').click(function(){
        //   let unitName = $(this).data('name');

        //   console.log(unitName);
        //   //href="/unit/+floorName+/+unitName";

        //   //window.location=href;
        //   window.location = '/unit?floorName=' + floorName + '&unitName=' + unitName;

        // })
    </script>
@endsection
