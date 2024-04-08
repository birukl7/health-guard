<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index() 
    {
        if (Auth::user()->hasRole('student')) {
            return view('student.dashboard');
        } elseif (Auth::user()->hasRole('health_professional')) {

            return view('health_pro.dashboard');
        } elseif (Auth::user()->hasRole('admin')) {

            return view('admin.dashboard');
        }
    }
}
