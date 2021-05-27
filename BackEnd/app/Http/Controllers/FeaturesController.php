<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturesModel;

class FeaturesController extends Controller
{
    function FeaturesIndex(){
        return view('Features');
    }
    function getFeaturesData(){
        $result=json_decode(FeaturesModel::orderBy('id','desc')->get());

        return $result;
    }
    function featuresAddNew(Request $req){
        $title=$req->input('title');
        $des=$req->input('des');
        $icon=$req->input('icon');

        $result=FeaturesModel::insert([
            'title'=>$title,
            'des'=>$des,
            'icon'=>$icon
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
    function getFeaturesDetails(Request $request){
        $id=$request->input('id');

        $result=json_decode(FeaturesModel::where('id','=',$id)->get());

        return $result;
    }
    function featuresUpdate(Request $request){
        $id=$request->input('id');
        $title=$request->input('title');
        $des=$request->input('des');
        $icon=$request->input('icon');

        $result=FeaturesModel::where('id','=',$id)->update([
            'title'=>$title,
            'des'=>$des,
            'icon'=>$icon
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
    function featuresDelete(Request $request){
        $id=$request->input('id');
        $result=FeaturesModel::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
