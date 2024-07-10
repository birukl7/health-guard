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
        $counseling = $request->input('counseling');
        $city = $request->input('city');
        $age = $request->input('age');
        $gender = $request->input('gender');
    
        $doctors = User::whereHas('roles', function ($query) {
                $query->where('name', 'health_professional');
            })
            ->whereHas('healthProfessionalProfile', function ($query) use ($city) {
                $query->where('location', 'like', "%$city%");
            });
    
        if ($counseling && $counseling != 'all') {
            $doctors->whereHas('healthProfessionalProfile', function ($query) use ($counseling) {
                $query->whereJsonContains('issues', $counseling);
            });
        }
    
        if ($age && $age != 'all') {
            $doctors->whereHas('healthProfessionalProfile', function ($query) use ($age) {
                $query->where('age', '>=', $age);
            });
        }
    
        if ($gender && $gender != 'All') {
            $doctors->where('gender', $gender);
        }
    
        // dd($doctors);
        $results = $doctors->paginate(3);
        return view('home.index', ['doctors' => $results]);
    }
}
