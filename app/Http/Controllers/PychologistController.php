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
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'health_professional');
        })->whereHas('healthProfessionalProfile')
          ->with('healthProfessionalProfile')
          ->orderBy('created_at', 'desc') // Order by the most recent created_at value
          ->simplePaginate(6);
    
        return view('home.index', ['doctors' => $doctors]);
    }
}
