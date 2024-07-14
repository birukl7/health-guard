<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\HealthProfessionalProfile;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){

    }
    public function indexStudent(){

    }

    public function indexPsychologist(){
        return view('');
    }

    public function showStudent($id) {
        $student = User::findOrFail($id);

        $notifications = Notification::where('sender_id', $student->id)
        ->where('receiver_id', Auth::user()->id)
        ->get()->first();

        // dd($notifications->id);

        return view('student_view.index', ['student' => $student, 'notification' => $notifications]);
    }

    public function showPsychologist(HealthProfessionalProfile $healthProfessionalProfile) {
       // $psychologist = User::findOrFail($id);

        // if(Auth::user()->hasRole('health_professional'))
       // dd($healthProfessionalProfile);
        if($healthProfessionalProfile && Auth::user()){
            $notifications = Notification::where('sender_id', Auth::user()->id)
            ->where('receiver_id', $healthProfessionalProfile->id)
            ->get()->first();
            // dd('failure');
            if($notifications){
                $user = User::findOrFail($notifications->receiver_id);
                return view('health_professionals.show', ['psychologist' => $healthProfessionalProfile, 'notification'=> $notifications, 'userm' => $user]);
            }else {
                return view('health_professionals.show', ['psychologist' => $healthProfessionalProfile, 'notification'=> null]); 
            }

        }
        return view('health_professionals.show', ['psychologist' => $healthProfessionalProfile, 'notification'=> null]); 

    }
}
