<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodPic;
use Image;
use File;
use Session;
use Illuminate\Support\Facades\DB; 

class AdminFoodPicController extends Controller
{	
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showpic($id) {

        $food = Food::find($id);
        // return view('admin-foodpic',compact('food'));

        $food_pics = DB::table('food_pic')->where('food_id',$id)->paginate(5);

        return view('admin-foodpic', compact('food'), ['foods'=>$food_pics]);
    }

    public function destroy($id) {
    	// FoodPic::find($id)->delete();
        // HealthPic::destroy($id);
        $foods = FoodPic::find($id);

        File::delete(public_path() . '/images/resize_food/' .$foods->food_pic_file);
        $foods->delete();

        return back();
    }

    public function update(Request $request, $id) {
  
        $food_id = Food::find($id);

        if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');
                    return redirect()->back();
                }

            $images = $request->file('images');

            foreach($request->file('images') as $image) {
                $food_pic = new FoodPic();
                $food_pic->food_id = $food_id->food_id;

                $filename = str_random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/images/', $filename);
                Image::make(public_path() . '/images/' . $filename)->resize(800, 450)->save(public_path() . '/images/resize_food/' . $filename);

                $food_pic->food_pic_file = $filename;
                File::delete(public_path() . '/images/' .$food_pic->food_pic_file);

                $food_pic->save();
            } 

            Session::flash('flash_message', 'รูปภาพถูกเพิ่มแล้ว!');
        } 
        
        return redirect()->back();
    }
}
