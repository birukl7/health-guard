<?php

namespace App\Http\Controllers;

use App\Models\HealthProfessionalProfile;
use App\Rules\AgeRange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HealthProfessionalProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        
        $tags = Auth::user()->healthProfessionalProfile;
        if(isset($tags)){
            $tags = Auth::user()->healthProfessionalProfile->tags;
            return view('professionals.create',['issues'=> $tags]);
        }
        return view('professionals.create', ['issues' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();
        $validated = $request->validate([
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'about' => 'required|string|max:255',
            'description' => 'required|string|max:3000',
            'date_of_birth' => ['required', 'date', new AgeRange],
            'specialization' => 'required|string',
            'hospital_affiliation' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'phone_number' => [
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
            'location' => 'required|string|max:255',
            // 'license' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'linkedin' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'price' => 'required|string|in:free,paid',
            'years_of_experience' => 'required|string|in:0-1,2-5,5-7,7-10,10+',
        ]);

        $health = $user->healthProfessionalProfile()->create($validated);

        // dd($health);

        foreach($request->issues as $issue){
            $health->tag($issue);
        }

        $user->name = $validated['first_name'].' '.$validated['last_name'];

       // dd($user);
        return redirect()->route('professionals.create')->with('success', 'Health professional profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $health = Auth::user()->healthProfessionalProfile;
        
        $validated = $request->validate([
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'about' => 'required|string|max:255',
            'description' => 'required|string|max:3000',
            'date_of_birth' => ['required', 'date', new AgeRange],
            'specialization' => 'required|string',
            'hospital_affiliation' => 'required|string|max:255',
            'phone_number' => [
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
            'location' => 'required|string|max:255',
            // 'license' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            'linkedin' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'price' => 'required|string|in:free,paid',
            'years_of_experience' => 'required|string|in:0-1,2-5,5-7,7-10,10+',
        ]);

        foreach($health->tags->pluck('name')->toArray() as $issue){
            $health->removeTag($issue);
        }

        foreach($request->issues as $issue){
            $health->tag($issue);
        }

        $user = Auth::user();
        $user->name = $validated['first_name'].' '.$validated['last_name'];
        $user->save();
        
        $health->update($validated);
        return redirect()->route('professionals.create')->with('success', 'Health professional profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
