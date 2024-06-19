<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Langganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        if ($user) {
            return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambah');
        } else {
            return redirect()->route('pengguna')->with('error', 'Pengguna gagal ditambah');
        }

    }

    public function destroy($id)
    {
        Langganan::where('user_id', $id)->delete();

        $penulis = User::findOrFail($id);
        $penulis->delete();

        if ($penulis) {
            return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus');
        } else {
            return redirect()->route('pengguna')->with('error', 'Pengguna gagal dihapus');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:5',
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

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        if ($user) {
            return redirect()->route('pengguna')->with('success', 'Pengguna berhasil diubah');
        } else {
            return redirect()->route('pengguna')->with('error', 'Pengguna gagal diubah');
        }
    }
}
