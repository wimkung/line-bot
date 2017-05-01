<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HealthRequest;
use App\Http\Requests;
use App\User;
use App\Share;
use App\SharePic;
use Image; 
use Illuminate\Support\Facades\DB;
use File;
use Session;
use Carbon\Carbon;
use Auth;

class MemberShareController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $shares = Share::orderBy('share_id', 'desc')->paginate(3); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        // return view('health.index', compact('healths'));

        return view('share.index', compact('shares'));
    }

    public function create() {
        return view('share.create');
    }

    public function store(Request $request) {
        $share = new Share();
        $share->share_title = $request->share_title;
        $share->share_inform = $request->share_inform;
        $share->created_at = Carbon::now();
        $share->save();

        $share_id = Share::orderBy('share_id', 'desc')->first();

        // $id = Auth::id();
        // dd($id);

        // $id = User::orderBy('id')->first();
        // $id = Auth::user()->id;

        $share_id->id = Auth::id();
        // dd($id);
        $share_id->save();

        if ($request->hasFile('images')) {

            $count = count($request->file('images'));
                if ($count>25) {
                    Session::flash('flash_message','อัพโหลดรูปได้ไม่เกิน 25 รูปเท่านั้น!!!');

                    $share_pic = new SharePic();
                    $share_pic->share_id = $share_id->share_id;

                    $share_pic->share_pic_file = 'nopic.png';
                    $share_pic->save();

                    return redirect()->back();
                }

            $images = $request->file('images');

            foreach($request->file('images') as $image) {
                $share_pic = new SharePic();
                $share_pic->share_id = $share_id->share_id;

                $filename = str_random(10) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/images/', $filename);
                Image::make(public_path() . '/images/' . $filename)->resize(800, 450)->save(public_path() . '/images/resize_share/' . $filename);

                $share_pic->share_pic_file = $filename;
                File::delete(public_path() . '/images/' .$share_pic->share_pic_file);

                $share_pic->save();
            } 

        } else {
            $share_pic = new SharePic();
            $share_pic->share_id = $share_id->share_id;

            $share_pic->share_pic_file = 'nopic.png';

            $share_pic->save();
        }
        
    
        Session::flash('flash_message', 'ข้อมูลถูกเพิ่มแล้ว!');

        return redirect()->back();
    }

    public function show($id) {

        // $share_pics = DB::table('share_experiences')->select('share_experiences.*','share_pics.share_pic_file')->join('share_pics','share_experiences.share_id','=','share_pics.share_id')->where('share_experiences.share_id',$id)->get();

        // $users_info = DB::table('users')->select('users.*','share_experiences.share_id')->join('share_experiences','users.id','=','share_experiences.share_id')->where('users.id',$id)->get();

        // $users_info = DB::table('share_experiences')->select('share_experiences.*',$id);

        $share_info = DB::table('users')->select('users.*','share_experience.*','share_pic.share_pic_file')->join('share_experience','users.id','=','share_experience.id')->join('share_pic','share_pic.share_id','=','share_experience.share_id')->where('share_experience.share_id',$id)->get();

        return view('share.show', ['shares'=>$share_info]);
    }
}
