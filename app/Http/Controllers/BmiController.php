<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
	public function index() {
    	return view('bmi');
    }

    public function calculate(Request $request) {

        $weight = (float)($request->weight); 
        $height = (float)($request->height);

    
        $bmi = ROUND($weight/(($height/100)**2),2);

        if($bmi <= 18.50 ) {
            return view('user-conclude-bmi-1', compact('bmi'));
        }
        elseif($bmi >= 18.50 && $bmi <=22.90) {
            return view('user-conclude-bmi-2', compact('bmi'));
        }
        elseif($bmi >= 23 && $bmi <= 24.90) {
            return view('user-conclude-bmi-3', compact('bmi'));
        }
        elseif($bmi >= 25 && $bmi <= 29.90) {
            return view('user-conclude-bmi-4', compact('bmi'));
        }
        elseif($bmi >= 30) {
            return view('user-conclude-bmi-5', compact('bmi'));
        }
        else{
            return view('bmi', compact('bmi'));
        }
    }
}
