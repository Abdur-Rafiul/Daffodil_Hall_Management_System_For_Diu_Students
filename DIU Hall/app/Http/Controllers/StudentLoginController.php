<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginModel;

class StudentLoginController extends Controller
{
    function StudentLogin(){
        return view('Frontend.LoginFrom');
    }

    function submitNewAccount(Request $req){

        $studentId = $req->input('studentId');
        $studentEmail = $req->input('studentEmail');
        $studentPhoneNumber = $req->input('studentPhoneNumber');
        $studentPassword = $req->input('studentPassword');
        $studentName = $req->input('studentName');

        $result= loginModel::insert([
            'student_id'=>$studentId,
            'student_name'=>$studentName,
            'student_Email'=>$studentEmail,
            'student_Phone'=>$studentPhoneNumber,
            'student_Password'=>$studentPassword

        ]);
        if($result){

            return 1;
        }
        else{

            return 0;
        }



    }


function  submitForgotAccount(Request $req){

        $studentId1 = $req->input('studentId1');
        $studentEmail1 = $req->input('studentEmail1');
        $studentPhoneNumber1 = $req->input('studentPhoneNumber1');
        $studentOldPassword = $req->input('studentOldPassword');
        $studentNewPassword = $req->input('studentNewPassword');

        $result= loginModel::where('student_id','=',$studentId1)->
        where('student_Password','=',$studentOldPassword)->
        update(['student_Password'=>$studentNewPassword



]);




}


    function onLogin(Request $request){
        //dd($request->all());
        $studentId2= $request->input('studentId2');
        $studentPaassword2= $request->input('studentPaassword2');

        $countValue=loginModel::where('student_id','=',$studentId2)->where('student_Password','=',$studentPaassword2)->count();

        if($countValue==1){
            $request->session()->put('user',$studentId2);
            return 1;
        }
        else{
            return 0;
        }

    }


    function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/StudentLogin');
    }




}
