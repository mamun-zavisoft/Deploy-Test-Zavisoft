<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
            [
                'title' => 'Profile',
            ],
        ]);
    }

    /**
     * Update the user's profile information.
     */

public function update(ProfileUpdateRequest $request)
{
    $user = $request->user();

    $user->fill($request->validated());

    // ✅ Handle image upload properly
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('profile', 'public');
        $user->image = $path;
    }

    // ✅ Reset email verification if email changed
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    // ❌ DO NOT return JSON (tests expect redirect)
    return redirect('/profile')->with('success', 'Profile updated successfully');
}


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

    // ✅ MUST match test expectation
    return redirect('/');
}
