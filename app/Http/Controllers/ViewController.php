<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    // Form View
    public static function formView($created = false){
        return view('layouts.form',['code'=>'xmxwebdemo2','created'=>$created]);
    }

    // Table with data view
    public static function tableView($dataset){
        return view('layouts.table',['customers' => $dataset]);
    }

    //Error views
    public static function errorView($message = 'No encontramos lo que buscabas'){
        return view('layouts.error',['message' => $message]);
    }
    public static function notFoundView(){
        return view('layouts.error',['message' => 'No encontramos lo que buscabas']);
    }
}
