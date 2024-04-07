<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index() 
    {

        if(Auth::user()->role_id === 'student'){
            return view('dashboard.student');
        } elseif(Auth::user()->role_id === 'health_professional'){
            return view('dashboard.health_professional');
        } else {
            return view('dashboard.admin');
        }
    }
}
