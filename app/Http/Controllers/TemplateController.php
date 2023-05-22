<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function show(Request  $request)
    {
        $can=0;
        if($request->session()->has('id_role')==3){
            $can=1;
            return view('layouts.template',['can'=>$can]);
        }
        }
}
