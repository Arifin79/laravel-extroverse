<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    // use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        return view ('login/index', []);
    }

    public function authentication(Request $request): RedirectResponse
    {
        // $credential = $request->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        // if(Auth::attempt($credential)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // }

        // return back()->with('loginError', 'login Failed! :(');

        // $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]))
        {
            if (auth()->user()->role_id == 'admin') {
                return redirect()->route('home');
            } else {
                return redirect()->route('home.karyawan');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function logout(Request $request)
    {
        Auth::Logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
