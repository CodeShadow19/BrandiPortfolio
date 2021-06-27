<?php

namespace App\Http\Controllers;
use App\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function ContactIndex(){
        return view('Contact');
    }
    function getContactData(){
        $result=json_decode(ContactModel::orderBy('id','desc')->get());

        return $result;
    }
    function deleteContact(Request $request){
        $id=$request->input('id');

        $result=ContactModel::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
