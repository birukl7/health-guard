<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.name', 'student')
        ->select('users.*')
        ->get();
        return view('student.index', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = StudentProfile::findOrFail($id);
        $student->delete();
    }

    public function showSetStatus()
    {
        return view('student.status');
    }

    public function showStatusQuestion(Request $request)
    {
        $title = $request->title;
        $questions = $request->questions; 
    }

    public function setStatus(Request $request)
    {

    }
}
