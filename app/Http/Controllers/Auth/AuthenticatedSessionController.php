<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\user;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->status === 1) {
            return redirect()->intended(RouteServiceProvider::HOME);
            // return redirect()->intended(RouteServiceProvider::HOME);
        }
        else {

            $request->session()->invalidate();

            $request->session()->regenerateToken();
    
            throw ValidationException::withMessages([
                'email' => 'Your account has been suspended. Please contact administrator.',
            ]);

        }

        // return redirect()->intended(RouteServiceProvider::HOME);

        // if(user::where('email', $request->email)->where('status', '1')->first()) {
    
        //     $request->session()->regenerate();

        //     return redirect()->intended(RouteServiceProvider::HOME);

        // }
        // else {
        //     throw ValidationException::withMessages([
        //         'email' => 'you are banned',
        //     ]);
        // }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
