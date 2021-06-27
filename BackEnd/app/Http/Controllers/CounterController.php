<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CounterModel;

class CounterController extends Controller
{
    function CounterIndex(){
        return view('Counter');
    }
    function getCounterData(){
        $result=json_decode(CounterModel::all());
        return $result;
    }
    function updateCounter(Request $req){
        $id=$req->input('id');
        $workHour=$req->input('workHour');
        $clients=$req->input('clients');
        $deliver_project=$req->input('deliver_project');
        $award_won=$req->input('award_won');

        $result=CounterModel::where('id','=',$id)->update([
            'work_hour'=>$workHour,
            'clients'=>$clients,
            'deliver_project'=>$deliver_project,
            'award_won'=>$award_won
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
