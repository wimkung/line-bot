<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exercise;
use App\ExercisePic;
use Image;
use File;
use Session;

class MemberExerciseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

    	$exercises = Exercise::orderBy('exercise_id', 'desc')->paginate(3);

    	return view('member-exercise-index', compact('exercises'));
    }

    public function show($id) {

        $exercise_text = DB::table('exercise')->select('exercise.*')->where('exercise_id',$id)->get();

        $exercise_pics = DB::table('exercise')->select('exercise.*','exercise_pic.exercise_pic_file')->join('exercise_pic','exercise.exercise_id','=','exercise_pic.exercise_id')->where('exercise.exercise_id',$id)->get();

        return view('member-exercise-show', compact('exercise_text'), ['exercises'=>$exercise_pics]);
    }

    public function search(Request $request) {

        $exercise_searches = Exercise::where('exercise_title', 'LIKE', '%'.$request->search.'%')->paginate(3);

        return view('member-exercise-search', compact('exercise_searches'));
    }

}
