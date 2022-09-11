<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FloorModel;
use Illuminate\Support\Facades\Storage;

class floorControllerForAdmin extends Controller
{
    function floor(){

        return view('backend.floor');
    }



    function getFloorData(){
        //Storage::get('');
    	$result =json_encode(FloorModel::orderBy('id','asc')->get());

    	return $result;

    }

    function floorAdd(Request $req){
        $FloorName = $req->input('FloorName');


        $path= $req->file('FileKey')->store('public');
        $photoName=(explode('/',$path))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location=" http://".$host."/storage/".$photoName;

        $result= FloorModel::insert([
            'floor_name'=>$FloorName,
            'floor_img'=>$location

        ]);

        if($result){
            return 1;
        }else{
            return 0;
        }
    }


    function FloorEdit(Request $req){
        $id = $req->input('id');
        $result =json_encode(FloorModel::where('id', '=' ,$id)->get());

        return $result;
    }

    function FloorEditUpdateConfirmBtn(Request $req){
        $id = $req->input('id');
        $FloorName = $req->input('FloorName');


        $path= $req->file('FileKey')->store('public');
        $photoName=(explode('/',$path))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

        $result= FloorModel::where('id','=',$id)->update(['floor_img'=>$location,'floor_name'=>$FloorName]);
        if($result){
            return 1;
        }else{
            return 0;
        }


    }

    function FloorDelete(Request $req){


        $id = $req->input('id');
        $img = $req->input('img');
        $string =  $img;
        $token = strtok($string, "/");
        $token = strtok("/");
        $token = strtok("/");
        $token = strtok("/");
        $imgPath = $token;


        Storage::delete("/public/".$imgPath);

        $result =FloorModel::where('id', '=' ,$id)->delete();

        if($result){

            return 1;
        }
        else{

            return 0;
        }

    }
}
