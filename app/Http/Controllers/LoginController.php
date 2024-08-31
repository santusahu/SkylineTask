<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if ('GET' == $request->method()) {
            return view('login');
        }
        if ('POST' == $request->method()) {
            $data['email'] = $request->email;
            $data['password'] = $request->password;

            if (auth()->attempt($data)) {
                $user_data = Auth::user();
                Session::put('auth_user_data', $user_data);
                return redirect()->route('dashboard');
            }
            else {
                return redirect()->route('login')->with('failure', 'Invalid email or password.');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        auth()->logout();
        return redirect()->route('login');
    }
}
