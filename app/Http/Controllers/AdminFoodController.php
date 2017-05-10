<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Food;
use App\FoodPic;
use Image;
use File;
use Session; 

class AdminFoodController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $foods = Food::orderBy('food_id', 'desc')->paginate(5); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        return view('food.index', compact('foods'));
    }

    public function create() {
        return view('food.create');
    }

    public function store(Request $request) {
        $food = new Food();
        $food->food_title = $request->food_title;
        $food->food_inform = $request->food_inform;
        $food->save();

        $food_id = Food::orderBy('food_id', 'desc')->first();

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

        } 
        
        Session::flash('flash_message', 'ข้อมูลถูกเพิ่มแล้ว!');

        return redirect()->back();
    }

    public function show($id) {

        $food_text = DB::table('food')->select('food.*')->where('food_id',$id)->get();

        $food_pics = DB::table('food')->select('food.*','food_pic.food_pic_file')->join('food_pic','food.food_id','=','food_pic.food_id')->where('food.food_id',$id)->get();

        return view('food.show', compact('food_text'), ['foods'=>$food_pics]);
    }

    public function edit($id) {
        $food = Food::find($id);
        return view('food.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $food = Food::find($id);
        // $food->update(Request::all());
        $food->update($request->all()); 
        
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

        $foods = Food::find($id);

        $food_pics = DB::table('food_pic')->get()->where('food_id',$id);

        foreach ($food_pics as $food_pic) {

            File::delete(public_path() . '/images/resize_food/' .$food_pic->food_pic_file);
        }
        
        $foods->delete();
        return back();

        // Health::find($id)->delete();
        // Food::destroy($id);
        // return back();
    }
}
