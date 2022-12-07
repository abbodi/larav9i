<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($name=null)
    {
        if($name == null){
            return "this is name:  ";
        }else{
            return "this is name:  ".$name;
        }
        

    }

}
