<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberBmiController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
    	return view('member-bmi');
    }

    public function calculate(Request $request) {

        $weight = (float)($request->weight); 
        $height = (float)($request->height);

    
        $bmi = ROUND($weight/(($height/100)**2),2);
    
        if($bmi <= 18.50 ) {
            return view('member-conclude-bmi-1', compact('bmi'));
        }
        elseif($bmi >= 18.50 && $bmi <=22.90) {
            return view('member-conclude-bmi-2', compact('bmi'));
        }
        elseif($bmi >= 23 && $bmi <= 24.90) {
            return view('member-conclude-bmi-3', compact('bmi'));
        }
        elseif($bmi >= 25 && $bmi <= 29.90) {
            return view('member-conclude-bmi-4', compact('bmi'));
        }
        elseif($bmi >= 30) {
            return view('member-conclude-bmi-5', compact('bmi'));
        }
        else{
            return view('member-bmi', compact('bmi'));
        }
    }
}
