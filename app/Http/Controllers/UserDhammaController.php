<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dhamma;
use App\DhammaPic;
use Image;
use File;
use Session;

class UserDhammaController extends Controller
{
    public function index() {

    	$dhammas = Dhamma::orderBy('dhamma_id', 'desc')->paginate(3);

    	return view('user-dhamma-index', compact('dhammas'));
    }

    public function show($id) {

        $dhamma_pics = DB::table('dhamma_article')->select('dhamma_article.*','dhamma_pic.dhamma_pic_file')->join('dhamma_pic','dhamma_article.dhamma_id','=','dhamma_pic.dhamma_id')->where('dhamma_article.dhamma_id',$id)->get();

        return view('user-dhamma-show', ['dhammas'=>$dhamma_pics]);
    }

    public function search(Request $request) {

        $dhamma_searches = Dhamma::where('dhamma_title', 'LIKE', '%'.$request->search.'%')->paginate(3);

        return view('user-dhamma-search', compact('dhamma_searches'));
    }
}
