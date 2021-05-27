<?php

namespace App\Http\Controllers;

use App\BannerModel;
use App\CountModel;
use App\FeaturesModel;
use App\ProjectModel;
use App\TeamModel;
use App\VisitorModel;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;

class HomeController extends Controller
{
    function HomeIndex(){
        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate=date("Y-m-d h:i:sa");
        VisitorModel::insert([
            'ip_address'=>$UserIP,
            'visit_time'=>$timeDate
        ]);
        $BannerData=BannerModel::all();
        $FeaturesData=FeaturesModel::orderBy('id','desc')->take(3)->get();
        $ProjectData=ProjectModel::orderBy('id','desc')->take(8)->get();
        $TeamData=TeamModel::orderBy('id','desc')->take(4)->get();
        $CountData=CountModel::all();
        //$CountData = json_decode(json_encode($result), true);

        return view('Home',[
            'BannerData'=>$BannerData,
            'FeaturesData'=>$FeaturesData,
            'ProjectData'=>$ProjectData,
            'TeamData'=>$TeamData,
            'CountData'=>$CountData
        ]);
    }
}
