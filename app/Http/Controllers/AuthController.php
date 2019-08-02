<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function Login(){
    	$name = Request::input('name');
    	$password = Request::input('password');
    	if(Auth::attempt(['name'=>$name,'password'=>$password],false)){ 
          session()->put('Auth', Auth::user());
          session()->save();
	      //return Auth::user();
          return Auth::user();
	    } else { 
	      return response()->json(array("success"=>false));
	    } 
    } 

    public function Logout(){
    	Auth::logout(); 
        // Session::flush();
    	return 'logged out'; 
    }
}
