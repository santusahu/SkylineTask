<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function check_login(){
        $auth_user_data = Session::get('auth_user_data');
        if(Session::has('auth_user_data') && Session::get('auth_user_data') != null){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }

    }

    public function index()
    {
        return view('dashboard');
    }
}
