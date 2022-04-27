<?php

namespace App\Http\Controllers;

use App\Models\log_activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models;

class LogActivityController extends Controller
{

    public function index()
    {
        if (!Auth::user()->isAdministrator())   {
            return redirect ('/');
        }

        $log_activity = Models\log_activity::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.log.index',[
            'logs' => $log_activity,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(log_activity $log_activity)
    {
        //
    }

    public function edit(log_activity $log_activity)
    {
        //
    }

    public function update(Request $request, log_activity $log_activity)
    {
        //
    }

    public function destroy(log_activity $log)
    {
        $log->delete();
        return redirect("/admin/log");
    }
    public function destroyAll() {
        
        log_activity::truncate();
        \LogActivity::addToLog(Auth::user()->name.' has cleared the activity log ');
        return redirect("/admin/log");

    }
}
