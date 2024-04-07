<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
                $current_user->addRole('student');
                Auth::login($current_user);

                return redirect()->intended(route('dashboard'));
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                $newUser->addRole('student');
                Auth::login($newUser);

                return redirect()->intended(route('dashboard'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
