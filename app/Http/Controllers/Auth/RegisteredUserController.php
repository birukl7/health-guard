<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            //'role_id' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            //'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);
        //$user->addRole('admin');
        // $user->addRole($request->role_id);
        //$role = $request->role_id;
        $user->addRole($request->role_id);
        event(new Registered($user));

        Auth::login($user);

        if($user->hasRole('student') ){
            return view('dashboard.student');
        } elseif ($user->hasRole('health_professional')) {
            return view('dashboard.health_professional');
        }
        // return redirect(route('dashboard', absolute: false));
    }
}
