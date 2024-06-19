<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Langganan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class LanggananController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id|unique:langganans,user_id',
            'pembayaran_id' => 'required|exists:pembayarans,id',
            'no_tlpn' => 'required|max:12|unique:langganans,no_tlpn',
        ]);

        Langganan::create($validatedData);

        // Set status pengguna menjadi "Premium" (status_id: 2)
        $user = User::find($validatedData['user_id']);

        if ($user) {
            $user->status_id = 2; // Mengubah status pengguna menjadi "premium"
            $user->save();
        }

        if ($user) {
            return redirect()->route('langganan')->with('success', 'Langganan berhasil dibuat dan status pengguna diperbarui menjadi Premium.');
        } else {
            return redirect()->route('langganan')->with('error', 'Langganan gagal dibuat');
        }


    }

    public function destroy($id)
    {
        $langganan = Langganan::findOrFail($id);
        $userId = $langganan->user_id;
        $langganan->delete();

        // Set status pengguna menjadi "Reguler" (status_id: 1)
        $user = User::find($userId);

        if ($user) {
            $user->status_id = 1; // Mengubah status pengguna menjadi "reguler"
            $user->save();
        }

        if ($user) {
            return redirect()->route('langganan')->with('success', 'Langganan berhasil dihapus dan status pengguna diperbarui menjadi reguler.');
        } else {
            return redirect()->route('langganan')->with('error', 'Langganan gagal dihapus');
        }

    }
}
