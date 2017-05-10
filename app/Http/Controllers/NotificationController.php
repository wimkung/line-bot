<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use Auth;
use Session;
// use Illuminate\LINE;

class NotificationController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {

        return view('notification');
    }

    // public function store(Request $request) {

    // }

    public function notification(Request $request) {

    	  $notification = new Notification();
        $notification->notification_mess = $request->notification_mess;
        $notification->notification_time = $request->notification_time;
        $notification->id = Auth::id();
        
        $message='ชื่อการแจ้งเตือน: '.$request->notification_mess.
        '| เวลาที่ต้องทำ: '.$request->notification_time;

    	$line_api = 'https://notify-api.line.me/api/notify';
      	$token='XMW8GzoFjENogUM2D26YrXoauMl4NMLfWBZ24rKEd8F';

      	$queryData = array('message' => $message);
      	$queryData = http_build_query($queryData,'','&');
      	$headerOptions = array(
          	'http'=>array(
              	'method'=>'POST',
              	'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                  ."Authorization: Bearer ".$token."\r\n"
                  ."Content-Length: ".strlen($queryData)."\r\n",
              	'content' => $queryData
          	),
          	'ssl'=>array('verify_peer' => false)
      	);
      	$context = stream_context_create($headerOptions);
      	$result = file_get_contents($line_api, FALSE, $context);
      	$res = json_decode($result);

 		    $notification->notification_status='1';
 		    $notification->save();
 		
 		    Session::flash('flash_message', 'ข้อความถูกส่งแล้ว!');
 		    return redirect()->back();
  }
}
