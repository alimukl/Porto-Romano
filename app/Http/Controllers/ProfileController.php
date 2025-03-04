<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the user profile form
    public function show()
    {
        return view('panel.profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'age' => 'required|integer',
            'phone' => 'required|string|max:15',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Profile picture validation
        ]);

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->phone = $request->phone;

        // Handle file upload for profile photo
        if ($request->hasFile('profile_photo')) {
            // Delete the old profile photo if exists
            if ($user->profile_photo && Storage::exists('public/' . $user->profile_photo)) {
                Storage::delete('public/' . $user->profile_photo);
            }

            // Store the new profile photo in the 'public/profile_photos' directory
            $profilePhoto = $request->file('profile_photo');
            $filePath = $profilePhoto->storeAs('profile_photos', uniqid() . '.' . $profilePhoto->getClientOriginalExtension(), 'public');

            // Update the profile_photo field with the file path
            $user->profile_photo = 'profile_photos/' . basename($filePath);
        }


        // Save the updated user data
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}
