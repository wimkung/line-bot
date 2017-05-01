<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dhamma;
use App\DhammaPic;
use Image;
use File;
use Session; 


class AdminDhammaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $dhammas = Dhamma::orderBy('dhamma_id', 'desc')->paginate(5); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        return view('dhamma.index', compact('dhammas'));
    }

    public function create() {
        return view('dhamma.create');
    }

    public function store(Request $request) {
        $dhamma = new Dhamma();
        $dhamma->dhamma_title = $request->dhamma_title;
        $dhamma->dhamma_inform = $request->dhamma_inform;
        $dhamma->save();

        $dhamma_id = Dhamma::orderBy('dhamma_id', 'desc')->first();

        if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');

                    $dhamma_pic = new DhammaPic();
                    $dhamma_pic->dhamma_id = $dhamma_id->dhamma_id;

                    $dhamma_pic->dhamma_pic_file = 'nopic.png';
                    $dhamma_pic->save();

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

        } else {
            $dhamma_pic = new DhammaPic();
            $dhamma_pic->dhamma_id = $dhamma_id->dhamma_id;

            $dhamma_pic->dhamma_pic_file = 'nopic.png';

            $dhamma_pic->save();
        }
        
    
        Session::flash('flash_message', 'ข้อมูลถูกเพิ่มแล้ว!');

        return redirect()->back();
        // return redirect()->action('AdminDhammaController@index');
    }

    public function show($id) {

        $dhamma_pics = DB::table('dhamma_article')->select('dhamma_article.*','dhamma_pic.dhamma_pic_file')->join('dhamma_pic','dhamma_article.dhamma_id','=','dhamma_pic.dhamma_id')->where('dhamma_article.dhamma_id',$id)->get();

        return view('dhamma.show', ['dhammas'=>$dhamma_pics]);
    }

    public function edit($id) {
        $dhamma = Dhamma::find($id);
        return view('dhamma.edit',compact('dhamma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $dhamma = Dhamma::find($id);
        // $food->update(Request::all());
        $dhamma->update($request->all()); 
        
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
        Dhamma::destroy($id);
        return back();
    }
}
