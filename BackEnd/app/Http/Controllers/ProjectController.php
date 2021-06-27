<?php

namespace App\Http\Controllers;
use App\ProjectModel;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    function ProjectIndex(){
        return view('Projects');
    }
    function getProjectData(){
        $result=json_decode(ProjectModel::orderBy('id','desc')->get());

        return $result;
    }
    function ProjectAddNew(Request $request){
        $title=$request->input('title');
        $des=$request->input('des');
        $category=$request->input('category');
        $img=$request->input('img');

        $result=ProjectModel::insert([
            'title'=>$title,
            'category'=>$category,
            'img'=>$img,
            'des'=>$des
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
    function getProjectDetails(Request $request){
        $id=$request->input('id');

        $result=json_decode(ProjectModel::where('id','=',$id)->get());

        return $result;
    }
    function projectUpdate(Request $request){
        $id=$request->input('id');
        $title=$request->input('title');
        $des=$request->input('des');
        $category=$request->input('category');
        $img=$request->input('img');

        $result=ProjectModel::where('id','=',$id)->update([
            'title'=>$title,
            'category'=>$category,
            'img'=>$img,
            'des'=>$des
        ]);

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
    function projectDelete(Request $request){
        $id=$request->input('id');
        $result=ProjectModel::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
