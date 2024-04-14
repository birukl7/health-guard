<?php

namespace App\Http\Controllers;

use App\Models\DrugUseTracker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DrugUseTrackerController extends Controller
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
        return view('drugs.create');
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
            'question_3' => 'required|in:yes,no',
            'question_4' => 'required|in:yes,no',
            'question_5' => 'required|in:yes,no',
            'question_6' => 'required|in:yes,no',
            'question_7' => 'required|in:yes,no',
            'question_8' => 'required|in:yes,no',
            'question_9' => 'required|in:yes,no',
            'question_10' => 'required|in:yes,no',
        ]);

        $score = 0.0;
        foreach ($validated as $questionKey => $answer) {
            $mapNum = ['yes' => 1, 'no' => 0,];
            $score += $mapNum[$answer];
        }
        $score = 100.0 * ($score / 10.0);

        $validated['user_id'] = $userId;

        $drug = new DrugUseTracker();
        $drug->fill($validated);
        $drug->score = number_format($score, 1);
        $drug->save();
        return redirect()->route('students.create')->with('success', 'Drugs usage assesment informations created successfully.');
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
        try {
            // Fetch the alcohol record associated with the authenticated user
            $drug = DrugUseTracker::where('user_id', Auth::user()->id)->firstOrFail();

            // Validate the incoming data
            $validated = $request->validate([
                'question_1' => 'required|in:yes,no',
                'question_2' => 'required|in:yes,no',
                'question_3' => 'required|in:yes,no',
                'question_4' => 'required|in:yes,no',
                'question_5' => 'required|in:yes,no',
                'question_6' => 'required|in:yes,no',
                'question_7' => 'required|in:yes,no',
                'question_8' => 'required|in:yes,no',
                'question_9' => 'required|in:yes,no',
                'question_10' => 'required|in:yes,no',
            ]);

            $score = 0.0;
            foreach ($validated as $questionKey => $answer) {
                $mapNum = ['yes' => 1, 'no' => 0,];
                $score += $mapNum[$answer];
            }
            $score = 100.0 * ($score / 10.0);
            $drug = DrugUseTracker::where('user_id', Auth::user()->id)->firstOrFail();

            $drug->score = number_format($score, 1);
            // Update the alcohol record with the validated data
            $drug->update($validated);

            // Redirect or return a response
            return redirect()->route('students.create')->with('success', 'Drug usage assessment questions updated successfully.');
        } catch (ModelNotFoundException $e) {
            // Handle the case where the alcohol record for the authenticated user is not found
            return redirect()->back()->with('error', 'Alcohol record not found for the authenticated user.');
        } catch (\Exception $e) {
            // Handle other types of exceptions
            return redirect()->back()->with('error', 'An error occurred while updating the alcohol assessment questions.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
