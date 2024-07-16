<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $keyword = $request->input('search');
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'health_professional');
        })
        ->where(function ($query) use ($keyword) {
            $query->where('email', 'like', "%$keyword%")
                ->orWhereHas('healthProfessionalProfile', function ($query) use ($keyword) {
                    $query->where('first_name', 'like', "%$keyword%")
                        ->orWhere('last_name', 'like', "%$keyword%")
                        ->orWhere('about', 'like', "%$keyword%")
                        ->orWhere('description', 'like', "%$keyword%")
                        ->orWhere('specialization', 'like', "%$keyword%")
                        ->orWhere('hospital_affiliation', 'like', "%$keyword%")
                        ->orWhere('phone_number', 'like', "%$keyword%")
                        ->orWhere('location', 'like', "%$keyword%")
                        ->orWhere('license', 'like', "%$keyword%")
                        ->orWhere('years_of_experience', 'like', "%$keyword%")
                        ->orWhereJsonContains('issues', $keyword);
                });
        })
        ->paginate(6);
    return view('home.index', ['doctors' => $doctors]);
    }
}
