<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MedicineHerb;
use App\MedicineHerbPic;
use Image;
use File;
use Session;

class AdminMedicineHerbController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $medicines = MedicineHerb::orderBy('medicine_id', 'desc')->paginate(5); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        return view('medicine.index', compact('medicines'));
    }

    public function create() {
        return view('medicine.create');
    }

    public function store(Request $request) {
        $medicine = new MedicineHerb();
        $medicine->medicine_title = $request->medicine_title;
        $medicine->medicine_inform = $request->medicine_inform;
        $medicine->save();

        $medicine_id = MedicineHerb::orderBy('medicine_id', 'desc')->first();

        if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');

                    $medicine_pic = new MedicineHerbPic();
                    $medicine_pic->medicine_id = $medicine_id->medicine_id;

                    $medicine_pic->medicine_pic_file = 'nopic.png';
                    $medicine_pic->save();

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

        } else {
            $medicine_pic = new MedicineHerbPic();
            $medicine_pic->medicine_id = $medicine_id->medicine_id;

            $medicine_pic->medicine_pic_file = 'nopic.png';

            $medicine_pic->save();
        }
        
    
        Session::flash('flash_message', 'ข้อมูลถูกเพิ่มแล้ว!');

        return redirect()->back();
    }

    public function show($id) {

        $medicine_pics = DB::table('medicine_herb')->select('medicine_herb.*','medicine_pic.medicine_pic_file')->join('medicine_pic','medicine_herb.medicine_id','=','medicine_pic.medicine_id')->where('medicine_herb.medicine_id',$id)->get();

        return view('medicine.show', ['medicines'=>$medicine_pics]);
    }

    public function edit($id) {
        $medicine = MedicineHerb::find($id);
        return view('medicine.edit',compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $medicine = MedicineHerb::find($id);
        // $food->update(Request::all());
        $medicine->update($request->all()); 
        
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
        // Health::find($id)->delete();
        MedicineHerb::destroy($id);
        return back();
    }
}
