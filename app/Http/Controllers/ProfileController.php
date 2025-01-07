<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('panel.profile.index');
    }

    public function updateProfilePhoto(Request $request, $id)
    {
        // Validate the uploaded file
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the file is an image and limit size to 2MB
        ]);

        // Find the user by ID
        $user = User::find($id);

        // Check if the request has a file and upload it
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');

            // Store the file in the 'storage/app/public/images' directory
            $path = $file->store('images', 'public');

            // Save the file path to the user's profile
            $user->profile_photo = $path;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile photo updated successfully!');
    }


}
