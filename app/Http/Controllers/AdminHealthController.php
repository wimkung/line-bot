<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\HealthRequest;
use App\Http\Requests;
use App\Health;
use App\HealthPic;
use Image; 
use Illuminate\Support\Facades\DB;
use Request;
// use DB;
use File;
use Session;

class AdminHealthController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $healths = Health::orderBy('health_id', 'desc')->paginate(5); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        return view('health.index', compact('healths'));
    }

    public function create() {
        return view('health.create');
    }

    public function store(HealthRequest $request) {
        $health = new Health();
        $health->health_title = $request->health_title;
        $health->health_inform = $request->health_inform;
        $health->save();

        $health_id = Health::orderBy('health_id', 'desc')->first();

        if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');

                    $health_pic = new HealthPic();
                    $health_pic->health_id = $health_id->health_id;

                    $health_pic->health_pic_file = 'nopic.png';
                    $health_pic->save();
                    
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
         
        } else {
            $health_pic = new HealthPic();
            $health_pic->health_id = $health_id->health_id;

            $health_pic->health_pic_file = 'nopic.png';

            $health_pic->save();
        }
        
    
        Session::flash('flash_message', 'ข้อมูลถูกเพิ่มแล้ว!');

        return redirect()->back();
    }

    public function show($id) {

        $health_pics = DB::table('health_article')->select('health_article.*','health_pic.health_pic_file')->join('health_pic','health_article.health_id','=','health_pic.health_id')->where('health_article.health_id',$id)->get();

        return view('health.show', ['healths'=>$health_pics]);
    }

    public function edit($id)
    {
        $health = Health::find($id);

        $health_pics = DB::table('health_article')->select('health_article.*','health_pic.health_pic_file')->join('health_pic','health_article.health_id','=','health_pic.health_id')->where('health_article.health_id',$id)->get();

        return view('health.edit',compact('health'), ['healths'=>$health_pics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $health = Health::find($id);
        $health->update(Request::all());

        
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
        Health::destroy($id);
        return back();
    }

}
