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

        $score = 0.0;
        foreach ($validated as $questionKey => $answer) {
            $nums = explode('_', $questionKey);
            $num = $nums[1];

            if ($num == '5') {
                $mapNum = [
                    'increased_appetite_weight_gain' => -1,
                    'decreased_appetite_weight_loss' => 2,
                    'no_change' => 0,
                ];

                $score += $mapNum[$answer];
            } elseif ($num == '3' || $num == '6' || $num == '9') {
                $mapNum = [
                    'rarely' => 1,
                    'sometimes' => 2,
                    'often' => 3,
                    'always' => 4,
                ];
                $score += $mapNum[$answer];
            } else {
                $mapNum = ['yes' => 1, 'no' => 0,];
                $score += $mapNum[$answer];
            }
        }
        $score = 100.0 * ($score / 20.0);

        
        $validated['user_id'] = $userId;

        //echo($validated);
        $depression = new DepressionTracker();
        $depression->fill($validated);
        $depression->score = number_format($score, 1);
        $depression->save();

        return redirect()->route('students.create')->with('success', 'Depression assesment informations created successfully.');
        //$jscode = "<script>console.log(" . json_encode($validated) . ");</scrpt>";
        //return response()->make($jscode);
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
        $score = 0.0;
        $numss = [];
        foreach ($validated as $questionKey => $answer) {
            $nums = explode('_', $questionKey);
            $num = $nums[1];

            //$numss[] = $num;

            if ($num == '5') {
                $mapNum = [
                    'increased_appetite_weight_gain' => -1,
                    'decreased_appetite_weight_loss' => 2,
                    'no_change' => 0,
                ];

                $score += $mapNum[$answer];
                $numss[] = $mapNum[$answer];
            } elseif ($num == '3' || $num == '6' || $num == '9') {
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
        $score = 100.0 * ($score / 20.0);

        $validated['user_id'] = $userId;
        //$validated['score'] = $score;
        $numss[] = $score;
        
        $depression = DepressionTracker::where('user_id', Auth::user()->id)->firstOrFail();

        $depression->score = number_format($score, 1);
        $depression->update($validated);

        //dd($numss);

        // Redirect or return a response
        return redirect()->route('students.create')->with('success', 'Depression assesment questions updated successfully.');
        //$javascriptCode = "<script>console.log(" . json_encode($depression) . ");</script>";

    // Return the JavaScript code as a response
        //return response()->make($javascriptCode);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
