<?php

namespace App\Helpers;
use Request;
// use App\LogActivity as LogActivityModel;

use App\Models;

class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] = auth()->check() ? auth()->user()->id : null;
    	Models\log_activity::create($log);
    }


    public static function logActivityLists()
    {
    	return Models\log_activity::latest()->get();
    }


}