<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class PublicProfileController extends Controller
{
    public function show($id) {
        $view = 'user.detail';

        $user = Models\User::where('id', $id)->first();

        return view($view, [
            'user' => $user,
        ]);
    }

    public function edit($id) {
        if(Facades\Auth::check()){
            if(Facades\Auth::user()->id == $id) {

                $view = 'user.edit';

                $user = Models\User::where('id', $id)->first();

                return view($view, [
                    'user' => $user,
                ]);

            }
            return abort(404);
        }
    }

    public function update(Request $request, Models\User $user) {
        
        if(Facades\Auth::check()){
            if(Facades\Auth::user()->id == $user->id) {

                $request->validate([
                    'username' => ($request->username == $user->name) ? ['required', 'string', 'max:255'] : ['required', 'string', 'max:255', 'unique:users,name'],
                    'email' => ($request->email == $user->email) ? ['required', 'string', 'email', 'max:255'] : ['required', 'string', 'email', 'max:255', 'unique:users,email'],
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

                if($user->profile->profile_pic) {
                    $user->profile->profile_pic = $request->image ? $newImageName: $user->profile->profile_pic;
                }
                else {
                    $user->profile->profile_pic = $request->image ? $newImageName : null;
                }
        
                \LogActivity::addToLog(Auth::user()->name.' updated their profile');

                $user->save();
                $user->profile->save();

                return redirect('/user/' . $user->id);


            }
            return abort(404);
        }

    }

    public function changePasswordView(Models\User $user) {

        if(Facades\Auth::check()){
            if(Facades\Auth::user()->id == $user->id) {

                $view = 'user.tukar-password';

                return view($view, [
                    'user' => $user,
                ]);

            }
            return abort(404);
        }

    }

    public function changePassword(Request $request, Models\User $user) {

        if(Facades\Auth::check()){
            if(Facades\Auth::user()->id == $user->id) {

                $request->validate([
                    'old_password' => ['required'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
        
                if(Facades\Hash::check($request->old_password, $user->password)) {

                    $user->password = Facades\Hash::make($request->password);
                    $user->save();

                    \LogActivity::addToLog(Auth::user()->name.' changed their password');

                    Facades\Auth::guard('web')->logout();

                    $request->session()->invalidate();
            
                    $request->session()->regenerateToken();
            
                    return redirect('/login');

                }
                else {

                    \LogActivity::addToLog(Auth::user()->name.' attempted to changed their password');

                    throw ValidationException::withMessages([
                        'message' => 'Old password wrong',
                    ]);
                }
                // 'password' => Hash::make($request->password),
        
        
            }
            return abort(404);
        }
    }
}
