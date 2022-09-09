<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\unitModel;
use App\Models\FloorModel;
class unitAdminController extends Controller
{
    function unit(){
        $floorName = FloorModel::all();
        return view('backend.unit',['floorName'=>$floorName]);

    }


    function getUnitData(){
        //Storage::get('');
        $result =json_encode(unitModel::orderBy('id','asc')->get());

        return $result;

    }

    function UnitAdd(Request $req){
        $UnitName = $req->input('UnitName');
        $UnitFloorName = $req->input('UnitFloorName');


        $path= $req->file('FileKey')->store('public');
        $photoName=(explode('/',$path))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

        $result= unitModel::insert([
            'unit_name'=>$UnitName,
            'unit_img'=>$location,
            'floor_name'=>$UnitFloorName

        ]);

        if($result){
            return 1;
        }else{
            return 0;
        }
    }


    function UnitEdit(Request $req){
        $id = $req->input('id');
        $result =json_encode(unitModel::where('id', '=' ,$id)->get());

        return $result;
    }

    function UnitEditUpdateConfirmBtn(Request $req){
        $id = $req->input('id');
        $UnitName = $req->input('UnitName');
        $UnitEditFloorName = $req->input('UnitEditFloorName');


        $path= $req->file('FileKey')->store('public');
        $photoName=(explode('/',$path))[1];

        $host=$_SERVER['HTTP_HOST'];
        $location="http://".$host."/storage/".$photoName;

        $result= unitModel::where('id','=',$id)->update(['unit_img'=>$location,'unit_name'=>$UnitName,'floor_name'=>$UnitEditFloorName]);
        if($result){
            return 1;
        }else{
            return 0;
        }


    }

    function UnitDelete(Request $req){


        $id = $req->input('id');
        $img = $req->input('img');
        $string =  $img;
        $token = strtok($string, "/");




        $token = strtok("/");
        $token = strtok("/");
        $token = strtok("/");
        $imgPath = $token;


        Storage::delete("/public/".$imgPath);

        $result =unitModel::where('id', '=' ,$id)->delete();

        if($result){

            return 1;
        }
        else{

            return 0;
        }

    }
}
