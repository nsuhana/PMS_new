<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models;

class HomeAdminController extends Controller
{
    public function index () {

        if (!Auth::user()->isAdministrator())   {
            return redirect ('/');
        }

        $log_activity = Models\log_activity::orderBy('created_at', 'desc')->limit(6)->get();

        return view('admin.index',[
            'logs' => $log_activity,
        ]);
    }

}
