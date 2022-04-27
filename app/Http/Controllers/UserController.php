<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\user;
use App\Models\role;
use App\Models\profile;
use App\Models\user_project;
use App\Models\editor_comment;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'filter_superuser' => ['nullable', Rule::in(['0', '1'])],
            'filter_staffuser' => ['nullable', Rule::in(['0', '1'])],
            'filter_account_status' => ['nullable', Rule::in(['0', '1'])],
            'sortBy' => ['nullable', Rule::in(['name', 'email', 'recently_added'])],
            'keyword' => ['nullable', 'string'],
        ]);
        
        $x = $request->filter_superuser;
        $y = $request->filter_staffuser; 
        $z = $request->filter_account_status;
        $a = $request->sortBy;
        $b = $request->keyword;

        $user = User::when($request->filter_superuser != null, function ($q) use ($x) {
            return $q->whereHas('role', function ($q2) use ($x) { 
                $q2->where('superuser', $x);
            });
        }, function ($q) {
            return $q;
        })->when($request->filter_staffuser != null, function ($q) use ($y) {
            return $q->whereHas('role', function ($q2) use ($y) { 
                $q2->where('staffuser', $y);
            });
        }, function ($q) {
            return $q;
        }, 
        )->when($request->filter_account_status != null, function ($q) use ($z) {
            return $q->where('status', $z);
        }, function ($q) {
            return $q;
        })->when($request->sortBy != null, function ($q) use ($a) {
            return $q->when($a === 'recently_added', function ($q2) use ($a) {
                return $q2->orderBy('id', 'desc');                    
            }, function ($q2) use ($a) {
                return $q2->orderBy($a);
            });
        }, function ($q) {
            return $q->orderBy('name');
        })->when($request->keyword != null, function ($q) use ($b) {
            return $q->where('name', 'LIKE', '%'.$b.'%')->orWhere('email', 'LIKE', '%'.$b.'%');
        }, function ($q) {
            return $q;
        })->paginate(20);

        return view('admin.user.index', [
            'users' => $user,
            'filter_superuser' => $request->filter_superuser,
            'filter_staffuser' => $request->filter_staffuser,
            'filter_account_status' => $request->filter_account_status,
            'sortBy' => $request->sortBy,
            'keyword' => $request->keyword,
        ]); 
        
    }

    public function read(Request $request) {
        $user = User::all();

        return view('admin.user.read', [

            'user' => $user,
        ]);



        return response()->json([
            'status' => 400,
            'error' =>$validator->messages(),
            'title_message' => 'Error message!',
        ]);


    }

    public function create(Request $request)
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'superuser' => ['nullable', Rule::in(['0', '1'])],
            'admin' => ['nullable', Rule::in(['0', '1'])],
            'staffuser' => ['nullable', Rule::in(['0', '1'])],
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $profile = profile::create([
            'user_id' =>  $user->id,
        ]);

        $role = role::create([
            'user_id' =>  $user->id,
            'superuser' => $request->superuser ? '1' :'0',
            'admin' => $request->admin ? '1' :'0',
            'staffuser' => $request->staffuser ? '1' :'0',
        ]);

        \LogActivity::addToLog(Auth::user()->name.' create a user from admin panel ['.$user->name.']');

        return redirect('/admin/user/'.$user->id);
    }

    public function show(User $user)
    {

        return view('admin.user.detail', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        if (Auth::user()->isNotSuperUser() && $user->isSuperUser()) {
            return abort(404);
        } 

        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {

        if (Auth::user()->isNotSuperUser() && $user->isSuperUser()) {
            return abort(404);
        } 

        if (Auth::user()->isNotSuperUser() && $request->superuser == '1') {
            return abort(404);
        }

        $request->validate([
            'username' => ($request->username == $user->name) ? ['required', 'string', 'max:255'] : ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => ($request->email == $user->email) ? ['required', 'string', 'email', 'max:255'] : ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'superuser' => ['nullable', Rule::in(['0', '1'])],
            'admin' => ['nullable', Rule::in(['0', '1'])],
            'staffuser' => ['nullable', Rule::in(['0', '1'])],
            'fullname' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:225'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5048'],
        ]);   

        if($request->image) {

            $newImageName = time() . '-' . $request->username . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
    
        }

        $user->name = $request->username;
        $user->email = $request->email;
        $user->profile->fullname = $request->fullname;
        $user->profile->bio = $request->bio;

        $user->role->superuser = ($request->superuser)? '1' : '0';
        $user->role->admin = ($request->admin)? '1' : '0';
        $user->role->staffuser = ($request->staffuser)? '1' : '0';

        if($user->profile->profile_pic) {
            $user->profile->profile_pic = $request->image ? $newImageName: $user->profile->profile_pic;
        }
        else {
            $user->profile->profile_pic = $request->image ? $newImageName : null;
        }

        $user->save();
        $user->profile->save();
        $user->role->save();

        \LogActivity::addToLog(Auth::user()->name.' edit a user from admin panel ['.$user->name.']');

        return redirect('admin/user/' . $user->id);
    }

    public function destroy(user $user)
    {
        if ($user->isSuperUser()) {

            \LogActivity::addToLog(Auth::user()->name.' attempt to delete a user from admin panel ['.$user->name.']');

            throw ValidationException::withMessages([
                'message' => 'You cannot delete a superuser',
            ]);
        }

        if ($user->isAdmin()) {

            \LogActivity::addToLog(Auth::user()->name.' attempt to delete a user from admin panel ['.$user->name.']');

            throw ValidationException::withMessages([
                'message' => 'You cannot delete an admin user',
            ]);
        }

        if($user->user_project->where('user_role_project', 'owner')->isNotEmpty()) {

            \LogActivity::addToLog(Auth::user()->name.' attempt to delete a user from admin panel ['.$user->name.']');

            throw ValidationException::withMessages([
                'message' => 'You cannot delete this user because they owned a project(s)',
            ]);
        };
        
        if(user_project::onlyTrashed()->where('user_id', $user->id)->exists()) {

            \LogActivity::addToLog(Auth::user()->name.' attempt to delete a user from admin panel ['.$user->name.']');

            throw ValidationException::withMessages([
                'message' => 'You cannot delete this user because it has owned project(s) inside the bin. (Recommendation: delete the project(s) first from the project bin)',
            ]);
        };

        foreach ($user->user_project as $result) {
            $result->delete();
        }

        if($user->log_activity->isNotEmpty()) {
            foreach ($user->log_activity as $log) {
                $log->user_id = null;
                $log->save();
            }
        };

        if($user->editor_comment()->withTrashed()->count() > 0) {

            foreach ($user->editor_comment()->withTrashed()->get() as $comment) {
                $comment->user_id = null;
                $comment->save();
            }
        };


        \LogActivity::addToLog(Auth::user()->name.' delete a user from admin panel ['.$user->name.']');

        $user->role->delete();
        $user->profile->delete();
        $user->user_project()->forcedelete();
        $user->delete();
        return redirect("/admin/user");
    }

    public function updateStatus(user $user)
    {
        
        if ($user->isSuperUser()) {
            throw ValidationException::withMessages([
                'message' => 'You cannot deactive a superuser',
            ]);
        }

        if ($user->isAdmin()) {
            throw ValidationException::withMessages([
                'message' => 'You cannot deactive an admin user',
            ]);
        }

        if ($user->status === 1) {

            if($user->user_project->where('user_role_project', 'owner')->isNotEmpty()) {
                throw ValidationException::withMessages([
                    'message' => 'You cannot deactive this user because they owned a project(s). (Recommendation: transfer project ownership to another user.)',
                ]);
            };

            // if(user_project::onlyTrashed()->where('user_id', $user->id)->exists()) {
            //     throw ValidationException::withMessages([
            //         'message' => 'You cannot deactive this user because it has owned project(s) inside the bin. (Recommendation: delete the project(s) first from the project bin.)',
            //     ]);
            // };
    
            // foreach ($user->user_project as $result) {
            //     $result->delete();
            // }
    
            $user->status = 0;
        }
        else {
            $user->status = 1;
        }

        $user->save();

        \LogActivity::addToLog(Auth::user()->name.' change a user status from admin panel ['.$user->name.']');
        
        return redirect('admin/user/' . $user->id);
    }

}
