<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FloorModel;
use App\Models\manyStudentModel;


class HomeController extends Controller
{
    function HomeIndex(){


        return view('Frontend.Layout.Home');
    }



    function idSearch(Request $request)
        // Fetch records
       {
           //dd($request->all());
              return manyStudentModel::all();


        }

        function studentSearch($id){

            $studentDetails =manyStudentModel::where('student_id', '=' ,$id)->get();
            $count =manyStudentModel::where('student_id', '=' ,$id)->count();

            if($count == 1){
                return view('Frontend.singleViewStudent',['student'=>$studentDetails]);
            }else{
                return redirect('/')->with('fa','Student ID Not Found');
            }

        }



}