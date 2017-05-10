<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Health;
use App\HealthPic;
use Image; 
use Illuminate\Support\Facades\DB;
// use Request;
// use DB;
use File;
use Session;

class UserHealthController extends Controller
{
    public function index() {
        $healths = Health::orderBy('health_id', 'desc')->paginate(3); // form1
        // $foods = DB::table('foods')->paginate(5); //form2 will use DB
    	// $foods = Food::orderBy('food_id', 'desc')->paginate(6);
    	// $count = Food::count();
    	// return view('health.index', compact('foods', 'count'));

        return view('user-health-index', compact('healths'));
    }

    public function show($id) {

        $health_text = DB::table('health_article')->select('health_article.*')->where('health_id',$id)->get();

        $health_pics = DB::table('health_article')->select('health_article.*','health_pic.health_pic_file')->join('health_pic','health_article.health_id','=','health_pic.health_id')->where('health_article.health_id',$id)->get();

        return view('user-health-show', compact('health_text'), ['healths'=>$health_pics]);
    }

    public function search(Request $request) {

        $health_searches = Health::where('health_title', 'LIKE', '%'.$request->search.'%')->paginate(3);

        return view('user-health-search', compact('health_searches'));
    }
}
