<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\Rules;

class GoogleController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $current_user = User::where('google_id', $user->id)->first();

            if ($current_user) {
                //var_dump('current user', $current_user);
                Auth::login($current_user);
                return redirect()->intended(route('dashboard'));
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                var_dump('new user', $newUser);
                Auth::login($newUser);

                return view('auth.google-quick-login', ['user' => $newUser]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function finishUp(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => 'required',
        ]);

        $user->password = Hash::make($data['password']);
        $user->addRole($data['role_id']);
        $user->markEmailAsVerified();
        $user->save();
        Auth::login($user);

        return redirect()->intended(route('dashboard'));
    }
}
