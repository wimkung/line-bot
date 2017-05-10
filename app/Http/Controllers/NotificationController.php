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

<<<<<<< HEAD
    	  $notification = new Notification();
        $notification->notification_mess = $request->notification_mess;
        $notification->notification_time = $request->notification_time;
        $notification->id = Auth::id();
=======
      $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('1PJqZhAv5RWER6iN7UmlY7pAP7Rv3HZtRXaMFgJewfnsx+qCXCIpV/YAI9mlcJ97tvu3cMvy4z/9cQZa0C8RCgey/yDYQP1VDYh2a7m/yCairQwOWnECaXm+zVvtFr3DhXX75BI5hIlZ6DY5QTE/PwdB04t89/1O/w1cDnyilFU=');
      $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '7db8a1a620b8cdd01f1362b1a1733232']);

      $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
      $response = $bot->pushMessage('Ue6225eceb0023ed23483c776e0991539', $textMessageBuilder);

      echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    }
  //   	  $notification = new Notification();
  //       $notification->notification_mess = $request->notification_mess;
  //       $notification->notification_time = $request->notification_time;
  //       $notification->id = Auth::id();
>>>>>>> 60eca91b22e4b1b063db592f5769ef41aae64d0d
        
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
