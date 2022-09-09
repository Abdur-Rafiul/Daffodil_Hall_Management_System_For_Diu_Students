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

            $pdf = PDF::loadView('user',['singlestudent'=>$singlestudent]);
            //download PDF file with download method
            return $pdf->download($studentid.".pdf");
            // return $pdf->stream($unitName."-".$studentid.".pdf");
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

}
