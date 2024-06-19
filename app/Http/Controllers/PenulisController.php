<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenulisController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
            'role_id' => 'required|exists:roles,id', // Pastikan id role ada dalam tabel roles
            'status_id' => 'required|exists:statuses,id', // Pastikan id status ada dalam tabel statuses
        ]);

        $user = new User();

        // Assign the validated data to the User instance
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); // Hash the password
        $user->role_id = $validatedData['role_id']; // Assign the role_id
        $user->status_id = $validatedData['status_id']; // Assign the role_id

        // Save the user to the database
        $user->save();

        // Redirect with success message
        if ($user) {
            return redirect()->route('penulis')->with('success', 'Data penulis berhasil dibuat');
        } else {
            return redirect()->route('penulis')->with('error', 'Data penulis gagal dibuat');
        }
    }

    public function destroy($id)
    {

        $penulis = User::findOrFail($id);
        $penulis->delete();

        if ($penulis) {
            return redirect()->route('penulis')->with('success', 'Data penulis berhasil dihapus');
        } else {
            return redirect()->route('penulis')->with('error', 'Data penulis gagal dihapus');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:5',
            'role_id' => 'required|exists:roles,id',
            'status_id' => 'required|exists:statuses,id',
        ]);

        // Ambil data user yang akan diupdate
        $user = User::findOrFail($id);

        // Update data user
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Jika password diisi, hash password baru
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->role_id = $validatedData['role_id'];
        $user->status_id = $validatedData['status_id'];

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        if ($user) {
            return redirect()->route('penulis')->with('success', 'Data penulis berhasil diperbarui');
        } else {
            return redirect()->route('penulis')->with('error', 'Data penulis gagal diperbarui');
        }
    }
}
