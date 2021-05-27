<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturesModel;

class FeaturesController2 extends Controller
{
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
}
