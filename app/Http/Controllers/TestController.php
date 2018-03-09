<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
    	$test = 'Hello Controller';
    	return view('welcome')->with('test',$test);
    }
}
