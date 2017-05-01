<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Notification; 
use Illuminate\Support\Facades\DB;

class AdminNotificationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $notifys = Notification::orderBy('notification_id', 'desc')->paginate(5); // form1
 
        return view('admin-notify', compact('notifys'));
    }

    public function destroy($id) {
       	Notification::destroy($id);
        return back();
    }
}
