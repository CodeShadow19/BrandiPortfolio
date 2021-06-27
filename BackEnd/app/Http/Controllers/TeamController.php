<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamModel;


class TeamController extends Controller
{
    function TeamIndex(){
        return view('Team');
    }
    function getTeamData(){
        $result=json_decode(TeamModel::orderBy('id','desc')->get());

        return $result;
    }
    function TeamAddNew(Request $request){
        $name=$request->input('name');
        $title=$request->input('title');
        $des=$request->input('des');
        $facebook=$request->input('facebook');
        $twitter=$request->input('twitter');
        $gmail=$request->input('gmail');
        $img=$request->input('img');

        $result=TeamModel::insert([
            'name'=>$name,
            'title'=>$title,
            'des'=>$des,
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'gmail'=>$gmail,
            'img'=>$img
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
    function getTeamDetails(Request $request){
        $id=$request->input('id');

        $result=json_decode(TeamModel::where('id','=',$id)->get());

        return $result;
    }
    function teamUpdate(Request $request){
        $id=$request->input('id');
        $name=$request->input('name');
        $title=$request->input('title');
        $des=$request->input('des');
        $facebook=$request->input('facebook');
        $twitter=$request->input('twitter');
        $gmail=$request->input('gmail');
        $img=$request->input('img');

        $result=TeamModel::where('id','=',$id)->update([
            'name'=>$name,
            'title'=>$title,
            'des'=>$des,
            'facebook'=>$facebook,
            'twitter'=>$twitter,
            'gmail'=>$gmail,
            'img'=>$img
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
    function teamDelete(Request $request){
        $id=$request->input('id');
        $result=TeamModel::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
