<?php

namespace App\Http\Controllers;

use App\Models\DepressionTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DepressionTrackerController extends Controller
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
        return view('depressions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $validated = $request->validate([
            'question_1' => 'required|in:yes,no',
            'question_2' => 'required|in:yes,no',
            'question_3' => 'required|in:rarely,sometimes,often,always',
            'question_4' => 'required|in:yes,no',
            'question_5' => 'required|in:increased_appetite_weight_gain,decreased_appetite_weight_loss,no_change',
            'question_6' => 'required|in:rarely,sometimes,often,always',
            'question_7' => 'required|in:yes,no',
            'question_8' => 'required|in:yes,no',
            'question_9' => 'required|in:rarely,sometimes,often,always',
            'question_10' => 'required|in:yes,no',
        ]);

        $validated['user_id'] = $userId;
        $depression = new DepressionTracker();
        $depression->fill($validated);
        $depression->save();
        return redirect()->route('students.create')->with('success', 'Depression assesment informations created successfully.');
        
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
        $userId = Auth::id();
        $validated = $request->validate([
            'question_1' => 'required|in:yes,no',
            'question_2' => 'required|in:yes,no',
            'question_3' => 'required|in:rarely,sometimes,often,always',
            'question_4' => 'required|in:yes,no',
            'question_5' => 'required|in:increased_appetite_weight_gain,decreased_appetite_weight_loss,no_change',
            'question_6' => 'required|in:rarely,sometimes,often,always',
            'question_7' => 'required|in:yes,no',
            'question_8' => 'required|in:yes,no',
            'question_9' => 'required|in:rarely,sometimes,often,always',
            'question_10' => 'required|in:yes,no',
        ]);

        $depression = DepressionTracker::where('user_id', Auth::user()->id)->firstOrFail();

        $depression->update($validated);
    
        // Redirect or return a response
        return redirect()->route('students.create')->with('success', 'Depression assesment questions updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
