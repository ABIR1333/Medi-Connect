<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Handle profile update
        $user->fill($request->validated());

        // Check if email has changed, if so, reset the email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Handle password update
        if ($request->filled('current_password') && $request->filled('password')) {
            // Check if the current password matches
            if (! Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            // Update password if valid
            $user->password = Hash::make($request->password);  // Hash the new password
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
