<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentProfileRequest;
use App\Models\StudentProfile;
use App\Models\User;
use App\Rules\AgeRange;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;

class StudentProfileController extends Controller
{


    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('students.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = StudentProfile::findOrFail($id);
        return view('students.partials.student-update-info', ['student'=> $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    public function attributes()
    {
        return [
            'emergency_contact_number' => 'Emergency Contact Number',
        ];
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'date_of_birth' => ['required', 'date', new AgeRange],
            'address' => 'required|string|max:255',
            'allergies' => 'nullable|string|max:255',
            'emergency_contact_name' => 'required|string|min:2|max:255',
            'emergency_contact_number' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Check if the value consists of digits only
                    if (!ctype_digit($value)) {
                        $fail('The '.$attribute.' must contain only digits.');
                        return;
                    }
            
                    // Check if the number starts with 07 or 09 and has a size of 10
                    if (preg_match('/^(07|09)\d{8}$/', $value)) {
                        return;
                    }
            
                    // Check if the number starts with 7 or 9 and has a size of 9
                    if (preg_match('/^(7|9)\d{8}$/', $value)) {
                        return;
                    }
            
                    // If none of the above conditions are met, fail the validation
                    $fail('The '.$attribute.' must start with 07, 09, 7, or 9 and be 9 or 10 digits long.');
                },
            ],
        ]);
    
        // Add the authenticated user's ID to the validated data
        $validated['user_id'] = $userId;
        $user = Auth::user();
        $user->name = $validated['first_name'].' '.$validated['last_name'];
        $user->save();

        // If validation passes, create the student record
        $student = new StudentProfile(); // Assuming you have a StudentProfile model
        $student->fill($validated);
        $student->save();
    
        // Redirect or return a response
        return redirect()->route('students.create')->with('success', 'Student Profile created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
       
        
        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'date_of_birth' => ['required', 'date', new AgeRange],
            'address' => 'required|string|max:255',
            'allergies' => 'nullable|string|max:255',
            'emergency_contact_name' => 'required|string|min:2|max:255',
            'emergency_contact_number' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Check if the value consists of digits only
                    if (!ctype_digit($value)) {
                        $fail('The '.$attribute.' must contain only digits.');
                        return;
                    }
            
                    // Check if the number starts with 07 or 09 and has a size of 10
                    if (preg_match('/^(07|09)\d{8}$/', $value)) {
                        return;
                    }
            
                    // Check if the number starts with 7 or 9 and has a size of 9
                    if (preg_match('/^(7|9)\d{8}$/', $value)) {
                        return;
                    }
            
                    // If none of the above conditions are met, fail the validation
                    $fail('The '.$attribute.' must start with 07, 09, 7, or 9 and be 9 or 10 digits long.');
                },
            ],
        ]);
    
        
        // Find the student record to update
        $student = StudentProfile::whereHas('user', function ($query) {
            $query->where('id', Auth::id());
        })->firstOrFail();

        $user = Auth::user();
        $user->name = $validated['first_name'].' '.$validated['last_name'];
        
        // Update the student record with the validated data
        $student->update($validated);
        $student->save();
    
        // Redirect or return a response
        return redirect()->route('students.create')->with('success', 'Student profile updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
