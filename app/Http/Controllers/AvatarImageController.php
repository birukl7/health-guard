<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded file
        ]);

        if ($request->hasFile('avatar')) {
            $avatarFileName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('public/users-avatar', $avatarFileName); // Store the uploaded image in storage

            // Update user's avatar column
            $user = Auth::user();
            $user->avatar = $avatarFileName;
            $user->save();

            return redirect()->back()->with('success', 'Avatar uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload avatar.');
    }
}
