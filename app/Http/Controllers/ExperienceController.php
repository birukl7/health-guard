<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
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
    public function create()
    {
        if(Auth::user()->hasRole('health_professional')){
            return view('experiences.create');
        }else{
            abort(404);
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasRole('health_professional')){
            $attrs = $request->validate([
                'title'=> ['required', 'max:20', 'string'],
                'description'=> ['required', 'max:250'],
                'company'=>['required', 'max:50'],
                'start_date'=> ['required', 'date'],
                'end_date'=> ['required', 'date'],
            ]);
    
            Auth::user()->experiences()->create($attrs);
    
            return redirect('/dashboard')->with('success', 'Health professional experience created successfully.');
        }else{
            abort(403);
        }
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
    public function edit(Experience $experience)
    {
        return view('experiences.edit', [
            'experience'=> $experience
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $attrs = $request->validate([
            'title'=> ['required', 'max:20', 'string'],
            'description'=> ['required', 'max:250'],
            'company'=>['required', 'max:50'],
            'start_date'=> ['required', 'date'],
            'end_date'=> ['required', 'date'],
        ]);

        $experience->update($attrs);

        return redirect('/dashboard')->with('success', 'Health professional experience updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect('/dashboard')->with('success', 'Health professional experience deleted successfully.');
    }
}
