<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;



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

    // Mise à jour du nom d'utilisateur
    $user->username = $request->input('username');

    // Mise à jour de la biographie
    $user->bio = $request->input('bio');

    // Mise à jour de l'email
    $user->fill($request->validated());

    // Si l'email a changé, réinitialisez la vérification de l'email
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

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

        /**
     * Avatar.
     */
    public function showAvatarForm(Request $request): View
    {
        return view('profile.avatar', [
            'user' => $request->user(),
        ]);
    }

    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('avatar')) {
            $user = $request->user();
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar_path = $path;
            $user->save();
        }

        return Redirect::route('profile.edit');
    }

    /**
     * Profil.
     */

     public function show(User $user)
    {
        $posts = $user->posts;

        return view('profile.show', compact('user', 'posts'));
    }


    /**
     * Follow a user.
     */
    public function follow(User $user): RedirectResponse
    {
        Auth::user()->following()->attach($user->id);

        return redirect()->back()->with('status', 'User followed successfully.');
    }

    /**
     * Unfollow a user.
     */
    public function unfollow(User $user): RedirectResponse
    {
        Auth::user()->following()->detach($user->id);

        return redirect()->back()->with('status', 'User unfollowed successfully.');
    }

}
