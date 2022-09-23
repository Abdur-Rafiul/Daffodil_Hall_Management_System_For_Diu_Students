<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manyStudentModel; 

class manyStudentTableController extends Controller
{

    function ManyStudent($floorName, $unitName){

       $unitStudent  = manyStudentModel::where(['floor_name' => $floorName,
              'unit_name' => $unitName])->get(['student_name', 'student_img','student_university', 'student_id','floor_name','unit_name']);

         return view('Frontend.manyStudentTable',['student'=>$unitStudent]);
        //return $unitStudent;
    }
}