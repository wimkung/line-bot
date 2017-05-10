<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EvaluationForm;
use App\TransactionForm;
use Illuminate\Support\Facades\DB;
use Auth;

class HistoryFormController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function history() {

        $historys = DB::table('transaction_form')->select('transaction_form.*','evalution_form.*')->join('evalution_form','transaction_form.form_id','=','evalution_form.form_id')->where('transaction_form.id', Auth::id())->orderBy('transaction_form.transaction_id', 'desc')->paginate(3);

         return view('history', compact('historys'));
    }
}
