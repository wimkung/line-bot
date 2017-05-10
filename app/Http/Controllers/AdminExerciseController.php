<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exercise;
use App\ExercisePic;
use Image;
use File;
use Session; 

class AdminExerciseController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $exercises = Exercise::orderBy('exercise_id', 'desc')->paginate(5); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        return view('exercise.index', compact('exercises'));
    }

    public function create() {
        return view('exercise.create');
    }

    public function store(Request $request) {
        $exercise = new Exercise();
        $exercise->exercise_title = $request->exercise_title;
        $exercise->exercise_inform = $request->exercise_inform;
        $exercise->save();

        $exercise_id = Exercise::orderBy('exercise_id', 'desc')->first();

        if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');
                    return redirect()->back();
                }

            $images = $request->file('images');

            foreach($request->file('images') as $image) {
                $exercise_pic = new ExercisePic();
                $exercise_pic->exercise_id = $exercise_id->exercise_id;

                $filename = str_random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/images/', $filename);
                Image::make(public_path() . '/images/' . $filename)->resize(800, 450)->save(public_path() . '/images/resize_exercise/' . $filename);

                $exercise_pic->exercise_pic_file = $filename;
                File::delete(public_path() . '/images/' .$exercise_pic->exercise_pic_file);

                $exercise_pic->save();
            } 

        } 
        
        Session::flash('flash_message', 'ข้อมูลถูกเพิ่มแล้ว!');

        return redirect()->back();
    }

    public function show($id) {

        $exercise_text = DB::table('exercise')->select('exercise.*')->where('exercise_id',$id)->get();

        $exercise_pics = DB::table('exercise')->select('exercise.*','exercise_pic.exercise_pic_file')->join('exercise_pic','exercise.exercise_id','=','exercise_pic.exercise_id')->where('exercise.exercise_id',$id)->get();

        return view('exercise.show', compact('exercise_text'), ['exercises'=>$exercise_pics]);
    }

    public function edit($id) {
        $exercise = Exercise::find($id);
        return view('exercise.edit',compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $exercise = Exercise::find($id);
        // $food->update(Request::all());
        $exercise->update($request->all()); 
        
        Session::flash('flash_message', 'ข้อมูลถูกอัพเดทแล้ว!');

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id) {

        $exercises = Exercise::find($id);

        $exercise_pics = DB::table('exercise_pic')->get()->where('exercise_id',$id);

        foreach ($exercise_pics as $exercise_pic) {

            File::delete(public_path() . '/images/resize_exercise/' .$exercise_pic->exercise_pic_file);
        }
        
        $exercises->delete();
        return back();

        // Health::find($id)->delete();
        // Exercise::destroy($id);
        // return back();
    }
}
