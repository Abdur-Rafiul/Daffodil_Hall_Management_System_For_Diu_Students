<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\FloorModel;
use App\Models\unitModel;
use App\Models\StudentApplicationMode;

class StudentApplicationController extends Controller
{
     function StudentApplication(){

      $floorName = FloorModel::all();
      $unitName = unitModel::all();

      return view('Frontend.StudentApplication',['floorName'=>$floorName,'unitName'=>$unitName]);


     }



    function submit(Request $req){

        $stdId  = $req->input('stdId');
        $stdName = $req->input('stdName');
        $FName = $req->input('FName');
        $FContact  = $req->input('FContact');
        $MName = $req->input('MName');
        $MContact = $req->input('MContact');
        $selectedDataFloor = $req->input('selectedDataFloor');
        $selectedDataUnit  = $req->input('selectedDataUnit');
        $stdProfession = $req->input('stdProfession');
        $stdDes = $req->input('stdDes');
        $stdAge  = $req->input('stdAge');
        $stdPhone = $req->input('stdPhone');
        $stdEmail = $req->input('stdEmail');
        $stdUniversity = $req->input('stdUniversity');
        $stdDob = $req->input('stdDob');
        $permanentDes = $req->input('permanentDes');
        $presentDes = $req->input('presentDes');


        $path= $req->file('FileKey')->store('images');

        $result= StudentApplicationMode::insert([
        'student_id'=>$stdId,
        'student_name'=>$stdName,
        'student_fatherName'=>$FName,
        'student_fatherContact'=>$FContact,
        'student_motherName'=>$MName,
        'student_motherContact'=>$MContact,
        'floor_name'=>$selectedDataFloor,


        'unit_name'=>$selectedDataUnit,
        'profession'=>$stdProfession,
        'student_des'=>$stdDes,
        'student_age'=>$stdAge,

        'student_phone'=>$stdPhone,
        'student_email'=>$stdEmail,
        'student_university'=>$stdUniversity,
        'DOB'=>$stdDob,

        'student_presentAddress'=>$permanentDes,
        'student_permanentAddress'=>$presentDes,
        'student_img'=>$path

    ]);


        if($result==true){

            return 1;
        }
        else {
            return 0;
        }

}

}