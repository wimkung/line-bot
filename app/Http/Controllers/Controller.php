<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function hello(){
    	return 'Hello from Controller';
    }

}


    
// use Illuminate\Support\Facades\View;
// use Illuminate\Routing\Controller;
// use App\Models\Health as health_article;


// class Controller extends BaseController
// {
//    public function getIndex(){
//    header('content-type:text/html; charset=utf-8');
//    $healths = Health::get();
//    return $healths ? 'Model Health Connect Yes!' : 'Error! Model Profile Connect False!!!';
//    }
// }
