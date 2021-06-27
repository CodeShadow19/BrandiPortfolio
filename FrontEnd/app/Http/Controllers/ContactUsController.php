<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function ContactUs(){
        return view('contactUs');
    }
}
