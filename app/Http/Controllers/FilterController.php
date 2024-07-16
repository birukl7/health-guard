<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'city' => 'nullable|string|max:25', // Adjust max length as needed
        ]);
        $specialization = $request->input('specialization');
        $city = $request->input('city');
        $experience = $request->input('experience');
        $gender = $request->input('gender');
    
        $doctors = User::whereHas('roles', function ($query) {
                $query->where('name', 'health_professional');
            })
            ->whereHas('healthProfessionalProfile')->orderBy('created_by', 'desc');
    
        if ($specialization && $specialization !== 'all') {
            $doctors->whereHas('healthProfessionalProfile', function ($query) use ($specialization) {
                $query->where('specialization', 'like', "%$specialization%");
            });
        }

        if ($city && $city !== 'all') {
            $doctors->whereHas('healthProfessionalProfile', function ($query) use ($city) {
                $query->where('location', 'like', "%$city%");
            });
        }
    
        if ($experience && $experience !== 'all') {
            $doctors->whereHas('healthProfessionalProfile', function ($query) use ($experience) {
                $query->where('years_of_experience', 'like', "%$experience%");
            });
        }
    
        if ($gender && $gender !== 'All') {
            $doctors->whereHas('healthProfessionalProfile', function ($query) use ($gender) {
                $query->where('gender', 'like', "%$gender%");
            });
        }
    
        // dd($doctors);
        $results = $doctors->paginate(3);
        return view('home.index', ['doctors' => $results]);
    }
}
