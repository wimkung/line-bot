<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	 public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
    	return view('auth.admin-login');
    }

    public function login(Request $request){
    	
    	// return true;

    	// Validate the form data
    	$this->validate($request, [
    		// 'name' => 'required|name',
            'email' => ' required|email|max:255',
    		'password' => 'required|min:6'
    	]);

    	// Attempt to log the user in
    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
    		// if successful, them redirect to their intended location
    		return redirect()->intended(route('admin.dashboard'));
    	}
    	
    	// if unsuccessful, then back to the login with the form data
    	return redirect()->back()->withInput($request->only('email'));
    }
}
