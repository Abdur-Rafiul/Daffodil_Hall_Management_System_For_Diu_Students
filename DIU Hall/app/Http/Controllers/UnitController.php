<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unitModel; 

class UnitController extends Controller
{

    function UnitIndex($floorName){
  

        $floorName = unitModel::all()->where('floor_name', $floorName);
        //$floorName = unitModel::all();
        return view('Frontend.Unit',['floorName'=>$floorName]);
       // return $floorName;
    }
}
