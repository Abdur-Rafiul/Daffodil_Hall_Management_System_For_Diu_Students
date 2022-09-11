<?php

namespace App\Http\Controllers;




use Illuminate\Support\Facades\App;
use PDF;
use Illuminate\Http\Request;
use App\Models\manyStudentModel;

class PDFController extends Controller
{
    function PDF($studentid){
        try {
            $singlestudent = manyStudentModel::where(['student_id' => $studentid])->first();

             $string =  $singlestudent['student_img'];
            // dd($string);
             $token = strtok($string, "/");
             $token = strtok("/");
             $token = strtok("/");
             $token = strtok("/");
             $imgPath = $token;
             //dd($imgPath);

            $pdf = PDF::setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ])->loadView('user',['singlestudent'=>$singlestudent,'img'=>$imgPath]);

            return $pdf->download($studentid.".pdf");


//            $pdf = PDF::loadView('user',['singlestudent'=>$singlestudent]);
//            //download PDF file with download method
//            return $pdf->download($studentid.".pdf");
            // return $pdf->stream($unitName."-".$studentid.".pdf");
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

}
