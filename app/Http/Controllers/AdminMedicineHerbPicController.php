<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\MedicineHerb;
use App\MedicineHerbPic;
use Image;
use File;
use Session;

class AdminMedicineHerbPicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showpic($id) {

        $medicine = MedicineHerb::find($id);

        $medicine_pics = DB::table('medicine_pic')->where('medicine_id',$id)->paginate(5);

        return view('admin-medicinepic', compact('medicine'), ['medicines'=>$medicine_pics]);
    }

    public function destroy($id) {
        $medicines = MedicineHerbPic::find($id);

        File::delete(public_path() . '/images/resize_medicine/' .$medicines->medicine_pic_file);
        $medicines->delete();

        return back();
    }

    public function update(Request $request, $id) {

    	$medicine_id = MedicineHerb::find($id);

    	if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');
                    return redirect()->back();
                }

            $images = $request->file('images');

            foreach($request->file('images') as $image) {
                $medicine_pic = new MedicineHerbPic();
                $medicine_pic->medicine_id = $medicine_id->medicine_id;

                $filename = str_random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/images/', $filename);
                Image::make(public_path() . '/images/' . $filename)->resize(800, 450)->save(public_path() . '/images/resize_medicine/' . $filename);

                $medicine_pic->medicine_pic_file = $filename;
                File::delete(public_path() . '/images/' .$medicine_pic->medicine_pic_file);

                $medicine_pic->save();
            }
            Session::flash('flash_message', 'รูปภาพถูกเพิ่มแล้ว!'); 
        } 
        return redirect()->back();
    }
}
