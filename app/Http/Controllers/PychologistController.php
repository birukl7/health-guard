<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PychologistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $perPage = 6;
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'health_professional');
        })->whereHas('healthProfessionalProfile')->paginate(6);
    
        return view('home.index', ['doctors' => $doctors]);
    }
}
