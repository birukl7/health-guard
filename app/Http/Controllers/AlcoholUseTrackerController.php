<?php

namespace App\Http\Controllers;

use App\Models\AlcoholUseTracker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AlcoholUseTrackerController extends Controller
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
        return view('alcohols.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $validated = $request->validate([
            'question_1' => 'required|in:yes,no',
            'question_2' => 'required|in:0_days,1-2_days,3-4_days,5_or_more_days',
            'question_3' => 'required|in:1-2_drinks,3-4_drinks,5_or_more_drinks,always',
            'question_4' => 'required|in:yes,no',
            'question_5' => 'required|in:yes,no',
            'question_6' => 'required|in:yes,no',
            'question_7' => 'required|in:rarely,sometimes,often,always',
            'question_8' => 'required|in:yes,no',
            'question_9' => 'required|in:yes,no',
            'question_10' => 'required|in:yes,no',
        ]);
        $score = 0.0;
        $numss = [];
        foreach ($validated as $questionKey => $answer) {
            $nums = explode('_', $questionKey);
            $num = $nums[1];

            //$numss[] = $num;

            if ($num == '2') {
                $mapNum = [
                    '0_days' => 0,
                    '1-2_days' => 1.5,
                    '3-4_days' => 3.5,
                    '5_or_more_days' => 5.5,
                ];

                $score += $mapNum[$answer];
                $numss[] = $mapNum[$answer];
            } elseif ($num == '3') {
                $mapNum = [
                    '1-2_drinks' => 1.5,
                    '3-4_drinks' => 3.5,
                    '5_or_more_drinks' => 5.5,
                    'always' => 7.0,
                ];
                $score += $mapNum[$answer];
                $numss[] = $mapNum[$answer];
            } elseif ($num == '7') {
                $mapNum = [
                    'rarely' => 1,
                    'sometimes' => 2,
                    'often' => 3,
                    'always' => 4,
                ];
                $score += $mapNum[$answer];
                $numss[] = $mapNum[$answer];
            } else {
                $mapNum = ['yes' => 1, 'no' => 0,];
                $score += $mapNum[$answer];
            }
        }

        $score = 100.0 * ($score / 22);

        $validated['user_id'] = $userId;
        $alcohol = new AlcoholUseTracker();
        $alcohol->score = number_format($score, 1);
        $alcohol->fill($validated);
        $alcohol->save();
        return redirect()->route('students.create')->with('success', 'Alcohol usage assesment informations created successfully.');
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
            $alcohol = AlcoholUseTracker::where('user_id', Auth::user()->id)->firstOrFail();

            // Validate the incoming data
            $validated = $request->validate([
                'question_1' => 'required|in:yes,no',
                'question_2' => 'required|in:0_days,1-2_days,3-4_days,5_or_more_days',
                'question_3' => 'required|in:1-2_drinks,3-4_drinks,5_or_more_drinks',
                'question_4' => 'required|in:yes,no',
                'question_5' => 'required|in:yes,no',
                'question_6' => 'required|in:yes,no',
                'question_7' => 'required|in:rarely,sometimes,often,always',
                'question_8' => 'required|in:yes,no',
                'question_9' => 'required|in:yes,no',
                'question_10' => 'required|in:yes,no',
            ]);

            $score = 0.0;
            $numss = [];
            foreach ($validated as $questionKey => $answer) {
                $nums = explode('_', $questionKey);
                $num = $nums[1];

                //$numss[] = $num;

                if ($num == '2') {
                    $mapNum = [
                        '0_days' => 0,
                        '1-2_days' => 1.5,
                        '3-4_days' => 3.5,
                        '5_or_more_days' => 5.5,
                    ];

                    $score += $mapNum[$answer];
                    $numss[] = $mapNum[$answer];
                } elseif ($num == '3') {
                    $mapNum = [
                        '1-2_drinks' => 1.5,
                        '3-4_drinks' => 3.5,
                        '5_or_more_drinks' => 5.5,
                        'always' => 7.0,
                    ];
                    $score += $mapNum[$answer];
                    $numss[] = $mapNum[$answer];
                } elseif ($num == '7') {
                    $mapNum = [
                        'rarely' => 1,
                        'sometimes' => 2,
                        'often' => 3,
                        'always' => 4,
                    ];
                    $score += $mapNum[$answer];
                    $numss[] = $mapNum[$answer];
                } else {
                    $mapNum = ['yes' => 1, 'no' => 0,];
                    $score += $mapNum[$answer];
                    $numss[] = $mapNum[$answer];
                }
            }

            $score = 100.0 * ($score / 22); 
            // Update the alcohol record with the validated data
            $alcohol->score = $score;
            $alcohol->update($validated);

            // Redirect or return a response
            return redirect()->route('students.create')->with('success', 'Alcohol assessment questions updated successfully.');
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
