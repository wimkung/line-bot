<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StressFormRequest;
use Illuminate\Support\Facades\DB;
use App\TransactionForm;
use Carbon\Carbon;
use Auth;
// use App\EvaluationForm;
// use App\QuestionForm;


class StressFormController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {

        return view('stress-form');
    }

    public function calculate(StressFormRequest $request) {

    	$ch1 = (int)($request->ch1);
    	$ch2 = (int)($request->ch2);
    	$ch3 = (int)($request->ch3);
    	$ch4 = (int)($request->ch4);
    	$ch5 = (int)($request->ch5);

        $sum = $ch1+$ch2+$ch3+$ch4+$ch5;

        $stress = new TransactionForm();
        $stress->created_at = Carbon::now();
        $stress->total_score = $sum;
        $stress->form_id = '1';
        $stress->save();

        $transaction_id = TransactionForm::orderBy('transaction_id', 'desc')->first();
        $transaction_id->id = Auth::id();
        // dd($id);
        $transaction_id->save();
    	// $sum += (int)($request->ch1);
        // return redirect()->back();

        if($sum >= 0 && $sum <= 4){
            return view('conclude-stress-form-1', compact('sum'));
        }
        elseif ($sum >=5 && $sum <=7) {
            return view('conclude-stress-form-2', compact('sum'));
        }
        elseif ($sum >= 8) {
            return view('conclude-stress-form-3', compact('sum'));
        }
        else{
            return view('stress-form', compact('sum'));
        }


        return view('stress-form', compact('sum'));

        // return view::make('stress-form', compact('sums'));
    }
    // public function show($id){
    //     $stress = DB::table('evalution_form')->select('question_form.question_id','question_form.question_text')->join('question_form','evalution_form.form_id','=','question_form.form_id')->where('evalution_form.form_id', $id)->get();

    //     return view('stress-form', compact('stress'));
    // }
}
