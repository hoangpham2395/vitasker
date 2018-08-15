<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

class LoginController extends Controller
{
    public function getLogin() 
    {
    	if (Auth::check()) {
    		return redirect('dashboard');
    	}
    	return view('login.login');
    }

    public function postLogin(Request $request) 
    {
    	// Validate
    	$rules = [
    		'username' => 'required',
    		'password' => 'required|min:6'
    	];
    	$validator = Validator::make($request->all(), $rules);
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator)->withInput();
    	}

    	$data = [
    		'username' => $request->input('username'), 
    		'password' => $request->input('password'),
    		'level' => 1
    	];

        $rememberMe = ($request->input('remember_me')) ? true : false;

    	if (Auth::attempt($data, $rememberMe)) {
    		return redirect()->intended('/dashboard');
    	}

    	return redirect()->back()->withErrors('Username or password is wrong.')->withInput();
    }

    public function getLogout() 
    {
    	Auth::logout();
        return redirect('login');
    }
}
