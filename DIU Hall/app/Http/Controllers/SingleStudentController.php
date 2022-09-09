<?php

namespace App\Http\Controllers;
use App\Models\manyStudentModel;
use Illuminate\Http\Request;

class SingleStudentController extends Controller
{
   function SingleStudent($floorName,$unitName,$studentid){
      $singlestudent  = manyStudentModel::where(['floor_name' => $floorName,
      'unit_name' => $unitName,'student_id' => $studentid])->get();

      // return $singlestudent;

      return view('Frontend.SingleStudent',['singlestudent'=>$singlestudent]);
   }
}
