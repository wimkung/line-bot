<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Food;
use App\FoodPic;
use Image;
use File;
use Session;

class UserFoodController extends Controller
{
	public function index() {

    	$foods = Food::orderBy('food_id', 'desc')->paginate(3);

    	return view('user-food-index', compact('foods'));
    }

    public function show($id) {

        $food_pics = DB::table('food')->select('food.*','food_pic.food_pic_file')->join('food_pic','food.food_id','=','food_pic.food_id')->where('food.food_id',$id)->get();

        return view('user-food-show', ['foods'=>$food_pics]);
    }

    public function search(Request $request) {

        $food_searches = Food::where('food_title', 'LIKE', '%'.$request->search.'%')->paginate(3);

        return view('user-food-search', compact('food_searches'));
    }
}
