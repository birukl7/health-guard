<?php

namespace App\Http\Controllers;

use App\Models\AlcoholUseTracker;
use App\Models\DepressionTracker;
use App\Models\DrugUseTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Laratrust;

class DashboardController extends Controller
{
    //
    public function index()
    {

        if (Auth::user()->hasRole('student') || (Auth::user()->role_id === 'student')) {
            $userId = Auth::user()->id;

            $depression = DepressionTracker::where('user_id', $userId)->first();
            $alcohol = AlcoholUseTracker::where('user_id', $userId)->first();
            $drug = DrugUseTracker::where('user_id', $userId)->first();
            
        
            if(isset($depression) && isset($alcohol) && isset($drug)) {
                return view('dashboard.student', ['depression'=> $depression, 'alcohol' => $alcohol, 'drug' => $drug]);
            } else if(isset($depression) && isset($alcohol)) {
                return view('dashboard.student', ['depression'=> $depression, 'alcohol' => $alcohol]);
            } else if(isset($depression) && isset($drug)) {
                return view('dashboard.student', ['depression'=> $depression, 'drug' => $drug]);
            } else if(isset($depression)) {
                return view('dashboard.student', ['depression'=> $depression]);
            } else if(isset($alcohol)) {
                return view('dashboard.student', [ 'alcohol' => $alcohol]);
            } else if(isset($drug)) {
                return view('dashboard.student', [ 'drug' => $drug]);
            } else {
                return view('dashboard.student');
            }
            
            
        } elseif (Auth::user()->hasRole('health_professional') || (Auth::user()->role_id === 'health_professional')) {

            return view('dashboard.health_professional');
        } else {
            return view('dashboard.admin');
        }
    }
}
