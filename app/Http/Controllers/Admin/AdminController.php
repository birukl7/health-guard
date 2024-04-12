<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\HealthProfessionalProfile;

class AdminController extends Controller
{
    
    public function index()
    {


        $results = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->whereIn('roles.id', [1, 2]) // Assuming student ID is 1 and health professional ID is 2
        ->groupBy('roles.id', 'roles.name') // Include 'roles.name' in GROUP BY
        ->select('roles.name as role_name', DB::raw('COUNT(*) as count'))
        ->get();

    $studentCount = DB::table('users')
        ->where('role_id', 1) // Assuming student ID is 1
        ->count();

    $blogCount = DB::table('blogs')->count();

        $data = HealthProfessionalProfile::select('id', 'created_at')
        ->get()
        ->groupBy(function ($record) {
            return $record->created_at->format('M');
        });

        $months = [];
        $monthCount= [];
        foreach($data as $month=>$values){
            $months[] = $month;
            $monthCount[] = count($values);
        }
        $sData = StudentProfile::select('id', 'created_at')
        ->get()
        ->groupBy(function ($record) {
            return $record->created_at->format('M');
        });

        $Smonths = [];
        $SmonthCount= [];
        foreach($sData as $month=>$value){
            $Smonths[] = $month;
            $SmonthCount[] = count($value);
        }
                            //'studentCount'=>$studentCount, 'healthProfessionalCount'=>$healthProfessionalCount
        return view('admin.dashboard', ['data' => $data, 'months'=>$months, 'monthCount'=> $monthCount, 'results'=> $results, 'studentCount' => $studentCount, 'blogCount'=>$blogCount,'Smonths'=>$Smonths, 'SmonthCount'=> $SmonthCount]);
    }

     public function login()
    {
        return view('admin.login');
    }
    public function submit_login(Request $request)
    {   
        $request->validate([
            'username' => 'required',
            'password'  => 'required'
        ]);

        $checkAdmin = Admin::where(['username'=> $request->username, 'password'=> $request->password])->count();
        if($checkAdmin>0){
            session(['adminLogin', true]);
           return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg', 'Invalid Credentials');
        }   
    }

    public function logout(){
        session()->forget('adminLogin');
        return redirect('admin/login');

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
        //
    }
}
