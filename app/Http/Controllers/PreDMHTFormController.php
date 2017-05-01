<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PreDMHTFormRequest;
use App\TransactionForm;
use Carbon\Carbon;
use Auth;

class PreDMHTFormController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        return view('pre-dm-ht-form');
    }

    public function calculate(Request $request) {

    	$ch1 = (int)($request->ch1);
    	$ch2 = (int)($request->ch2);
    	$ch3 = (int)($request->ch3);
    	$ch4 = (int)($request->ch4);
    	$ch5 = (int)($request->ch5);
    	$ch6 = (int)($request->ch6);
    	$ch7 = (int)($request->ch7);

    	$sum = $ch1+$ch2+$ch3+$ch4+$ch5+$ch6+$ch7;

        $predmht = new TransactionForm();
        $predmht->created_at = Carbon::now();
        $predmht->total_score = $sum;
        $predmht->form_id = '5';
        $predmht->save();

        $transaction_id = TransactionForm::orderBy('transaction_id', 'desc')->first();
        $transaction_id->id = Auth::id();
        $transaction_id->save();

        if($sum <= 2){
            return view('conclude-pre-dm-ht-form-1', compact('sum'));
        }
        elseif ($sum >= 3 && $sum <= 4) {
            return view('conclude-pre-dm-ht-form-2', compact('sum'));
        }
        elseif ($sum >= 5) {
            return view('conclude-pre-dm-ht-form-3', compact('sum'));
        }
        else{
            return view('pre-dm-ht-form', compact('sum'));
        }
    }
}
