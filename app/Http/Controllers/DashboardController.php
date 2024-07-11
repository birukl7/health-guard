<?php

namespace App\Http\Controllers;

use App\Models\AlcoholUseTracker;
use App\Models\DepressionTracker;
use App\Models\DrugUseTracker;
use App\Models\Notification;
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

        if (Auth::user()->hasRole('student')) {
            $userId = Auth::user()->id;

            $depression = DepressionTracker::where('user_id', $userId)->first();
            $alcohol = AlcoholUseTracker::where('user_id', $userId)->first();
            $drug = DrugUseTracker::where('user_id', $userId)->first();

            $doctor = Notification::where('sender_id',$userId)->get();


            
            // dd($doctor);
            if(isset($depression) && isset($alcohol) && isset($drug)) {
                return view('dashboard.student', ['depression'=> $depression, 'alcohol' => $alcohol, 'drug' => $drug, 'doctors'=> $doctor]);
            } else if(isset($depression) && isset($alcohol)) {
                return view('dashboard.student', ['depression'=> $depression, 'alcohol' => $alcohol, 'doctors'=>$doctor]);
            } else if(isset($depression) && isset($drug)) {
                return view('dashboard.student', ['depression'=> $depression, 'drug' => $drug, 'doctors'=>$doctor]);
            } else if(isset($depression)) {
                return view('dashboard.student', ['depression'=> $depression, 'doctors'=>$doctor]);
            } else if(isset($alcohol)) {
                return view('dashboard.student', [ 'alcohol' => $alcohol, 'doctors'=>$doctor]);
            } else if(isset($drug)) {
                return view('dashboard.student', [ 'drug' => $drug, 'doctors'=>$doctor]);
            } else {
                return view('dashboard.student', ['doctors'=>$doctor]);
            }
            // 0704512247
            
        } elseif (Auth::user()->hasRole('health_professional')) {

            return view('dashboard.health_professional');
        } else {
            return view('dashboard.admin');
        }
    }
}
