<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Share; 
use Illuminate\Support\Facades\DB;
use File;

class AdminShareController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $shares = Share::orderBy('share_id', 'desc')->paginate(5); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        // return view('health.index', compact('healths'));

        return view('admin-share', compact('shares'));
    }

    public function show($id) {

        $share_info = DB::table('users')->select('users.*','share_experience.*','share_pic.share_pic_file')->join('share_experience','users.id','=','share_experience.id')->join('share_pic','share_pic.share_id','=','share_experience.share_id')->where('share_experience.share_id',$id)->get();

        return view('admin-share-show', ['shares'=>$share_info]);
    
    }

    public function destroy($id) {

        $shares = Share::find($id);

        $share_pics = DB::table('share_pic')->get()->where('share_id',$id);

        foreach ($share_pics as $share_pic) {

            File::delete(public_path() . '/images/resize_share/' .$share_pic->share_pic_file);
        }
        
        $shares->delete();
        return back();

       	// Share::destroy($id);
        // return back();
    }
}
