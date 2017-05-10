<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Dhamma;
use App\DhammaPic;
use Image;
use File;
use Session;

class AdminDhammaPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showpic($id) {

        $dhamma = Dhamma::find($id);

        $dhamma_pics = DB::table('dhamma_pic')->where('dhamma_id',$id)->paginate(5);

        return view('admin-dhammapic', compact('dhamma'), ['dhammas'=>$dhamma_pics]);
    }

    public function destroy($id) {
        $dhammas = DhammaPic::find($id);

        File::delete(public_path() . '/images/resize_dhamma/' .$dhammas->dhamma_pic_file);
        $dhammas->delete();

        return back();
    }

    public function update(Request $request, $id) {

    	$dhamma_id = Dhamma::find($id);

    	if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');
                    return redirect()->back();
                }

            $images = $request->file('images');

            foreach($request->file('images') as $image) {
                $dhamma_pic = new DhammaPic();
                $dhamma_pic->dhamma_id = $dhamma_id->dhamma_id;

                $filename = str_random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/images/', $filename);
                Image::make(public_path() . '/images/' . $filename)->resize(800, 450)->save(public_path() . '/images/resize_dhamma/' . $filename);

                $dhamma_pic->dhamma_pic_file = $filename;
                File::delete(public_path() . '/images/' .$dhamma_pic->dhamma_pic_file);

                $dhamma_pic->save();
            } 
           	Session::flash('flash_message', 'รูปภาพถูกเพิ่มแล้ว!');
        } 
        
        return redirect()->back();
    }
}
