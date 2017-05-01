<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ADLFormRequest;
use App\TransactionForm;
use Carbon\Carbon;
use Auth;

class ADLFormController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        return view('adl-form');
    }

    public function calculate(ADLFormRequest $request) {

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

    	$sum = $ch1+$ch2+$ch3+$ch4+$ch5+$ch6+$ch7+$ch8+$ch9+$ch10;

        $adl = new TransactionForm();
        $adl->created_at = Carbon::now();
        $adl->total_score = $sum;
        $adl->form_id = '4';
        $adl->save();

        $transaction_id = TransactionForm::orderBy('transaction_id', 'desc')->first();
        $transaction_id->id = Auth::id();
        // dd($id);
        $transaction_id->save();

        if($sum >= 0 && $sum <= 4){
            return view('conclude-adl-form-1', compact('sum'));
        }
        elseif ($sum >= 5 && $sum <= 11) {
            return view('conclude-adl-form-2', compact('sum'));
        }
        elseif ($sum >= 12) {
            return view('conclude-adl-form-3', compact('sum'));
        }
        else{
            return view('adl-form', compact('sum'));
        }
    }
}
