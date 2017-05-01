<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MedicineHerb;
use App\MedicineHerbPic;
use Image;
use File;
use Session;

class MemberMedicineHerbController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

    	$medicines = MedicineHerb::orderBy('medicine_id', 'desc')->paginate(3);

    	return view('member-medicine-index', compact('medicines'));
    }

    public function show($id) {

       $medicine_pics = DB::table('medicine_herb')->select('medicine_herb.*','medicine_pic.medicine_pic_file')->join('medicine_pic','medicine_herb.medicine_id','=','medicine_pic.medicine_id')->where('medicine_herb.medicine_id',$id)->get();

        return view('member-medicine-show', ['medicines'=>$medicine_pics]);
    }

    public function search(Request $request) {

        $medicine_searches = MedicineHerb::where('medicine_title', 'LIKE', '%'.$request->search.'%')->paginate(3);

        return view('member-medicine-search', compact('medicine_searches'));
    }
}