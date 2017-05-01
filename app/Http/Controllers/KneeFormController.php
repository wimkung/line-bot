<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\KneeFormRequest;
use App\TransactionForm;
use Carbon\Carbon;
use Auth;

class KneeFormController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        return view('knee-form');
    }

    public function calculate(KneeFormRequest $request) {

    	$ch1 = (int)($request->ch1);
    	$ch2 = (int)($request->ch2);
    	$ch3 = (int)($request->ch3);
    	$ch4 = (int)($request->ch4);
    	$ch5 = (int)($request->ch5);
    	$ch6 = (int)($request->ch6);
    	$ch7 = (int)($request->ch7);
    	$ch8 = (int)($request->ch8);
    	$ch9 = (int)($request->ch9);
        $ch10 = (int)($request->ch10);
        $ch11 = (int)($request->ch11);
        $ch12 = (int)($request->ch12);

    	$sum = $ch1+$ch2+$ch3+$ch4+$ch5+$ch6+$ch7+$ch8+$ch9+$ch10+$ch11+$ch12;

        $knee = new TransactionForm();
        $knee->created_at = Carbon::now();
        $knee->total_score = $sum;
        $knee->form_id = '3';
        $knee->save();

        $transaction_id = TransactionForm::orderBy('transaction_id', 'desc')->first();
        $transaction_id->id = Auth::id();
        $transaction_id->save();

        if($sum >= 0 && $sum <= 19){
            return view('conclude-knee-form-1', compact('sum'));
        }
        elseif ($sum >= 20 && $sum <= 29) {
            return view('conclude-knee-form-2', compact('sum'));
        }
        elseif ($sum >= 30 && $sum <= 39) {
            return view('conclude-knee-form-3', compact('sum'));
        }
        elseif ($sum >= 40 && $sum <= 48) {
            return view('conclude-knee-form-4', compact('sum'));
        }
        else{
            return view('knee-form', compact('sum'));
        }
    }
}
