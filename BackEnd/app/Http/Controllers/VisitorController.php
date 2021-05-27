<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
    function VisitorIndex(){
        $result=VisitorModel::orderBy('id','desc')->take(5)->get();
        $VisitorData=json_decode($result);
        return view('Visitor',['VisitorData'=>$VisitorData]);
    }
}
