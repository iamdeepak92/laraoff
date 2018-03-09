<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function(){
	function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    };
	$PublicIP = getUserIP(); 
	echo $PublicIP;
	$ip = geoip()->getLocation($PublicIP);
	echo $ip->country;
});

// <?php
// $ip = '117.220.170.153';
// require "maxmind/geoip2.phar";
// $reader = new \GeoIp2\Database\Reader('maxmind/db/GeoLite2-City.mmdb');
// $record = $reader->city($ip);


// echo '<pre>';
// var_dump($record);
// print($record->country->name . "\n"); 
// print($record->mostSpecificSubdivision->name . "\n"); 
// print($record->city->name . "\n"); 
// print($record->postal->code . "\n"); 
// print($record->location->latitude . "\n"); 
// print($record->location->longitude . "\n"); 