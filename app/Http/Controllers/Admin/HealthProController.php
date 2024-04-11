<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\HealthProfessionalProfile;

class HealthProController extends Controller
{
    
    public function index()
    {
        $doctors = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.name', 'health professional')
        ->select('users.*')
        ->get();
        return view('health_pro.index', ['doctors'=>$doctors]);
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
        $doctor = HealthProfessionalProfile::findOrFail($id);
        $doctor->delete();
    }
}
