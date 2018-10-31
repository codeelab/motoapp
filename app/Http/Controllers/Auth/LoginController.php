<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('guest',['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {

        $credentials = $this->validate(Request(), [

            'username'   => 'required|string',
            'password'   => 'required|string'

        ]);

       if (Auth::attempt($credentials, $request->remember)) 
       {
            return redirect()->route('dashboard');
       }

       return redirect()
              ->back()
              ->withErrors(['username' => trans('auth.failed')])
              ->withInput($request->only('username', 'remember'));
       
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        session()->flash('success', 'Su sesión ha finalizado!');

        return redirect('/');
    }

}
