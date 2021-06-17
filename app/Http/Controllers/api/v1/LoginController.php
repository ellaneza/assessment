<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login( Request $request) 
    {
	    $response = [];
	    $credentials = $request->validate([
		    'email' => 'required',
		    'password' => 'required'
		]);

		if (!Auth::attempt($credentials)) 
		{
			return response(['message'=> 'Invalid login credentials']);
		}

		$accessToken = Auth::user()->createToken('authToken')->accessToken;

		return response(['user'=> Auth::user(), 'access_token'=> $accessToken]);
		 
    }

}
