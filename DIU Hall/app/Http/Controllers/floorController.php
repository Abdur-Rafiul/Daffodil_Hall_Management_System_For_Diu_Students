<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FloorModel; 
class floorController extends Controller
{
    function GetFloorData(){

    	$result =json_encode(FloorModel::get());

    	return $result;
    }
}