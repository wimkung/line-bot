<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Health;
use App\HealthPic;
use Image;
use File;
use Session;

class AdminHealthPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showpic($id) {

        $health = Health::find($id);

        $health_pics = DB::table('health_pic')->where('health_id',$id)->paginate(5);

        return view('admin-healthpic', compact('health'), ['healths'=>$health_pics]);
    }

    public function destroy($id) {
        $healths = HealthPic::find($id);

        File::delete(public_path() . '/images/resize/' .$healths->health_pic_file);
        $healths->delete();

        return back();
    }

    public function update(Request $request, $id) {
  
        $health_id = Health::find($id);

        if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');
    
                    return redirect()->back();
                } 

            $images = $request->file('images');

            foreach($request->file('images') as $image) {
                $health_pic = new HealthPic();
                $health_pic->health_id = $health_id->health_id;

                $filename = str_random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/images/', $filename);
                Image::make(public_path() . '/images/' . $filename)->resize(800, 450)->save(public_path() . '/images/resize/' . $filename);

                $health_pic->health_pic_file = $filename;
                File::delete(public_path() . '/images/' .$health_pic->health_pic_file);

                $health_pic->save(); 
            } 

            Session::flash('flash_message', 'รูปภาพถูกเพิ่มแล้ว!');
        } 

        return redirect()->back();
    }
}
