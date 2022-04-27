<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\profile;
use App\Models\role;

use Illuminate\Support\Facades\Auth;

class RestoreUserController extends Controller
{
    public function index() {

        $user = user::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate('20');

        $view = 'admin.user.trash.index';
        return view($view,[
            'users' => $user,
        ]);
    }

    public function restoreUser($id) {

        // ========= [profile] ===========
        profile::onlyTrashed()->where('user_id', $id)->restore();
        // ========= [role] ===========
        role::onlyTrashed()->where('user_id', $id)->restore();
        // ========= [vendor] ===========
        user::onlyTrashed()->find($id)->restore();

        \LogActivity::addToLog(Auth::user()->name.' restore a user from trash');

        return redirect('/admin/user/'.$id);
    }

    public function forceDestroyUser($id) {

        // ========= [profile] ===========
        profile::onlyTrashed()->where('user_id', $id)->forcedelete();
        // ========= [role] ===========
        role::onlyTrashed()->where('user_id', $id)->forcedelete();
        // ========= [vendor] ===========
        user::onlyTrashed()->find($id)->forcedelete();

        \LogActivity::addToLog(Auth::user()->name.' delete a user from trash');

        return redirect('/admin/user/deleted');

    }

}
