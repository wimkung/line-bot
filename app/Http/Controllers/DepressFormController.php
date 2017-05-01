<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DepressFormRequest;
use App\TransactionForm;
use Carbon\Carbon;
use Auth;

class DepressFormController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        return view('depress-form');
    }

    public function calculate(DepressFormRequest $request) {

    	$ch1 = (int)($request->ch1);
    	$ch2 = (int)($request->ch2);
    	$ch3 = (int)($request->ch3);
    	$ch4 = (int)($request->ch4);
    	$ch5 = (int)($request->ch5);
    	$ch6 = (int)($request->ch6);
    	$ch7 = (int)($request->ch7);
    	$ch8 = (int)($request->ch8);
    	$ch9 = (int)($request->ch9);

    	$sum = $ch1+$ch2+$ch3+$ch4+$ch5+$ch6+$ch7+$ch8+$ch9;

        $depress = new TransactionForm();
        $depress->created_at = Carbon::now();
        $depress->total_score = $sum;
        $depress->form_id = '2';
        $depress->save();

        $transaction_id = TransactionForm::orderBy('transaction_id', 'desc')->first();
        $transaction_id->id = Auth::id();
        $transaction_id->save();

        if($sum < 7){
            return view('conclude-depress-form-1', compact('sum'));
        }
        elseif ($sum >= 7 && $sum <= 12) {
            return view('conclude-depress-form-2', compact('sum'));
        }
        elseif ($sum >= 13 && $sum <= 18) {
            return view('conclude-depress-form-3', compact('sum'));
        }
        elseif ($sum >= 19) {
            return view('conclude-depress-form-4', compact('sum'));
        }
        else{
            return view('depress-form', compact('sum'));
        }
    }
}
