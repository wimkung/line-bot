<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Food;
use App\FoodPic;
use Image;
use File;
use Session;

class MemberFoodController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {

    	$foods = Food::orderBy('food_id', 'desc')->paginate(3);

    	return view('member-food-index', compact('foods'));
    }

    public function show($id) {

        $food_text = DB::table('food')->select('food.*')->where('food_id',$id)->get();

        $food_pics = DB::table('food')->select('food.*','food_pic.food_pic_file')->join('food_pic','food.food_id','=','food_pic.food_id')->where('food.food_id',$id)->get();

        return view('member-food-show', compact('food_text'), ['foods'=>$food_pics]);
    }

    public function search(Request $request) {

        $food_searches = Food::where('food_title', 'LIKE', '%'.$request->search.'%')->paginate(3);

        return view('member-food-search', compact('food_searches'));
    }
}
