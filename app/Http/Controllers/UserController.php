<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function showStudent() {

    }

    public function showPsychologist($id) {
        $psychologist = User::find($id);
        return view('health_professionals.show', ['psychologist' => $psychologist]);
    }
}
