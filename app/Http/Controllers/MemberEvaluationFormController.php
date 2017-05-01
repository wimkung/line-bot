<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EvaluationForm;

class MemberEvaluationFormController extends Controller
{
    public function index() {

    	return view('member-evaluation-form');
    	//$forms = EvaluationForm::orderBy('form_id', 'desc')->paginate(5);
    	//return view('member-evaluation-form', compact('forms'));
    }
}
