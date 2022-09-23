@extends('Frontend.Layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12 col-lg-12 p-lg-5 p-sm-0 p-md-0">
                <table id="studentDt" class="table table-primary table-striped table-sm table-bordered" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Photo</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">University Name</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($student as $student)
                            <tr class="">

                                <td><img style="height:100px; width:100px" src="{{ asset($student['student_img']) }}" />
                                </td>
                                <td class="mt-5">{{ $student['student_name'] }}</td>
                                <td>{{ $student['student_university'] }}
                                    <button class="ms-5"><a class="ml-3 text-center"
                                            href="/unit/{{ $student['floor_name'] }}/{{ $student['unit_name'] }}/{{ $student['student_id'] }}">Details</a></button>
                                </td>



                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#studentDt').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
