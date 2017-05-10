<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Exercise;
use App\ExercisePic;
use Image;
use File;
use Session;

class AdminExercisePicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showpic($id) {

        $exercise = Exercise::find($id);

        $exercise_pics = DB::table('exercise_pic')->where('exercise_id',$id)->paginate(5);

        return view('admin-exercisepic', compact('exercise'), ['exercises'=>$exercise_pics]);
    }

    public function destroy($id) {
        $exercises = ExercisePic::find($id);

        File::delete(public_path() . '/images/resize_exercise/' .$exercises->exercise_pic_file);
        $exercises->delete();

        return back();
    }

    public function update(Request $request, $id) {

    	$exercise_id = Exercise::find($id);

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
            Session::flash('flash_message', 'รูปภาพถูกเพิ่มแล้ว!');
        } 
        
        return redirect()->back();
    }
}
