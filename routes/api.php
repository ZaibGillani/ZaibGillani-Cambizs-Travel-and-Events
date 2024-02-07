<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("test-email", function(){
    $data = array('details'=>['name'=>"Test user"]);
    
      Mail::send('emails.Registration', $data, function($message) {
         $message->to('testjohn@yopmail.com')->subject
            ('Laravel Basic Testing Mail');
            $message->from('arsi.555@gmail.com');
        });
        echo "Basic Email Sent. Check your inbox.";
});