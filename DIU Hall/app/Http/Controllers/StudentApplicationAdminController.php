<?php

namespace App\Http\Controllers;

use App\Models\StudentApplicationMode;
use Illuminate\Http\Request;
use App\Models\FloorModel;
use App\Models\unitModel;
use App\Models\manyStudentModel;

use Illuminate\Support\Facades\DB;

class StudentApplicationAdminController extends Controller
{
    function studentApplication(){
        $floorName = FloorModel::all();
        $unitName = unitModel::all();
        return view('backend.studentApplication',['floorName'=>$floorName,'unitName'=>$unitName]);
    }

    function studentApplicationForm(){

        $floorName = FloorModel::all();
        $unitName = unitModel::all();

        return view('backend.studentApplicationForm',['floorName'=>$floorName,'unitName'=>$unitName]);

    }

    function submitFromAdmin(Request $req)
    {


        $stdId = $req->input('stdId');
        $stdName = $req->input('stdName');
        $FName = $req->input('FName');
        $FContact = $req->input('FContact');
        $MName = $req->input('MName');
        $MContact = $req->input('MContact');
        $selectedDataFloor = $req->input('selectedDataFloor');
        $selectedDataUnit = $req->input('selectedDataUnit');
        $stdProfession = $req->input('stdProfession');
        $stdDes = $req->input('stdDes');
        $stdAge = $req->input('stdAge');
        $stdPhone = $req->input('stdPhone');
        $stdEmail = $req->input('stdEmail');
        $stdUniversity = $req->input('stdUniversity');
        $stdDob = $req->input('stdDob');
        $permanentDes = $req->input('permanentDes');
        $presentDes = $req->input('presentDes');
        $permission = $req->input('permission');


        $path = $req->file('FileKey')->store('public');
        $photoName = (explode('/', $path))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "http://" . $host . "/storage/" . $photoName;

        $countValue = StudentApplicationMode::where('student_id', '=', $stdId)->count();

        if ($countValue == 1) {

            return 0;
        } else {

            $result = StudentApplicationMode::insert([
                'student_id' => $stdId,
                'student_name' => $stdName,
                'student_fatherName' => $FName,
                'student_fatherContact' => $FContact,
                'student_motherName' => $MName,
                'student_motherContact' => $MContact,
                'floor_name' => $selectedDataFloor,


                'unit_name' => $selectedDataUnit,
                'profession' => $stdProfession,
                'student_des' => $stdDes,
                'student_age' => $stdAge,

                'student_phone' => $stdPhone,
                'student_email' => $stdEmail,
                'student_university' => $stdUniversity,
                'DOB' => $stdDob,

                'student_presentAddress' => $permanentDes,
                'student_permanentAddress' => $presentDes,
                'student_img' => $location,
                'admin_permission' => $permission

            ]);


            if ($result == true) {

                return 1;
            } else {
                return 0;
            }

        }
    }
    function submitFromAdmin1(Request $req){
        //dd($req->all());
        $permission = 'Pending';
        $stdId = $req->input('stdId');
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



        $path= $req->file('FileKey')->store('public');
        $photoName=(explode('/',$path))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

        $countValue=StudentApplicationMode::where('student_id','=',$stdId)->count();
        $idre=StudentApplicationMode::where('student_id','=',$stdId)->get();

        if($countValue==1){

            return 0;
        }
        else{

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
            'student_img'=>$location,
            'admin_permission'=>$permission

        ]);


        if($result==true){

            return 1;
        }
        else {
            return 0;
        }

    }
    }
    function floorToUnit(Request $req){

        $text = $req->input('text');

        $floorName = json_encode(unitModel::get()->where('floor_name', $text));

        if($floorName){

            return $floorName;
        }else{

            return 0;
        }

    }

    function submitedData(){

        $StudentDetails = StudentApplicationMode::all();
        return $StudentDetails;
    }

    function StudentEditAdmin(Request $req){
        $id = $req->input('id');

        $result = json_encode(StudentApplicationMode::get()->where('id', $id));

        if($result){
            return $result;
        }else{
            return 0;
        }
    }

    function submit(Request $req){


        $stdId = $req->input('stdId');
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
        $permission = $req->input('permission');



        $path= $req->file('FileKey')->store('public');
        $photoName=(explode('/',$path))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

        $result= StudentApplicationMode::where('student_id','=',$stdId)->update([
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
            'student_img'=>$location,
            'admin_permission'=>$permission

        ]);


        if($result==true){

            return 1;
        }
        else {
            return 0;
        }

    }

    function submit1(Request $req){


        $stdId = $req->input('stdId');
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
        $permission = $req->input('permission');



        $path= $req->input('FileKey');
        //$photoName=(explode('/',$path))[1];

       // $host=$_SERVER['HTTP_HOST'];
        //$location="http://".$host."/storage/".$photoName;
        $countValue1=manyStudentModel::where('student_id','=',$stdId)->count();

        if($countValue1==0){



        $result1= manyStudentModel::insert([
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
            'student_img'=> $path,
            'admin_permission'=>$permission

        ]);

        $result2 = StudentApplicationMode::where('student_id','=',$stdId)->update([
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
            'student_img'=> $path,
            'admin_permission'=>$permission

        ]);


        if($result1 == 1){

            return 1;
        }
        else {
            return 0;
        }
        }else{
           // manyStudentModel::where('student_id', '=' ,$stdId)->delete();

            $result3 = StudentApplicationMode::where('student_id','=',$stdId)->update([
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
                'student_img'=> $path,
                'admin_permission'=>$permission

            ]);

            if($result3 == 1){

                return 1;
            }
            else {
                return 0;
            }
        }
    }


    function submitDelete(Request $req){

        $stdId = $req->input('stdId');

        $result =StudentApplicationMode::where('student_id', '=' ,$stdId)->delete();
        $result =manyStudentModel::where('student_id', '=' ,$stdId)->delete();



        if($result){
            return 1;
        }
    }



    function paymentMethod(Request $req){
        $stdId = $req->input('id');
        $date = $req->input('date');
        $countValue1=manyStudentModel::where('student_id','=',$stdId)->count();
        $student = manyStudentModel::where('student_id','=',$stdId)->get();
       // $req->session()->put('user','$student');
        if($countValue1==1){
            return $student;
        }else{
            return 0;
        }


    }

    function paymentAdminControl(){

        return view('backend.paymentAdminControl');

    }

    function getStudentDataPaymentClear(){

        return $paymentClear = DB::table('orders')->orderBy('id','desc')->get();


    }
}
