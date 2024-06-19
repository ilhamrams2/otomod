<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->input('remove_image') === 'default.png') {
            // Set image to default.png if remove_image input is present
            if ($user->image && $user->image !== 'default.png') {
                Storage::disk('public')->delete('img-profile/' . $user->image);
            }
            $validatedData['image'] = 'default.png';
        } elseif ($request->hasFile('image')) {
            // Handle the uploaded image
            $path = $request->file('image')->store('img-profile', 'public');

            // Delete the old image if it's not default.png
            if ($user->image && $user->image !== 'default.png') {
                Storage::disk('public')->delete('img-profile/' . $user->image);
            }

            // Extract only the filename without the directory
            $validatedData['image'] = pathinfo($path, PATHINFO_BASENAME);
        }

        // Update the user data
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            // Hash the password if provided
            'password' => isset($validatedData['password']) ? bcrypt($validatedData['password']) : $user->password,
            'image' => $validatedData['image'] ?? $user->image,
        ]);

        // Redirect with success message
        if ($user) {
            return redirect()->route('profile')->with('success', 'profile berhasil diperbaharui');
        } else {
            return redirect()->route('profile')->with('error', 'profile gagal diperbaharui');
        }

    }
}
