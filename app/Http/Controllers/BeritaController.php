<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Berita;
use App\Models\Status;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function detail($id)
    {

        $berita = Berita::with(['kategori', 'badge', 'user', 'status'])->findOrFail($id);

        $kategories = Kategori::all();
        $badges = Badge::all();
        $statues = Status::all();

        return view('backend.pages.detail', compact('berita'), [
            'kategories' => $kategories,
            'badges' => $badges,
            'statues' => $statues,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'status' => 'required',
            'badge' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
        ]);

        //Handle gambar
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('img-berita', 'public');
            $validatedData['gambar'] = $path;
        }

        $berita = new Berita();
        $berita->kategori_id = $validatedData['kategori'];
        $berita->status_id = $validatedData['status'];
        $berita->badge_id = $validatedData['badge'];
        $berita->judul = $validatedData['judul'];
        $berita->artikel = $validatedData['artikel'];
        $berita->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login

        if (isset($validatedData['gambar'])) {
            $berita->gambar = $validatedData['gambar'];
        }

        $berita->save();

        // Redirect atau respons yang sesuai
        if ($berita) {
            return redirect()->route('berita')->with('success', 'Berita berhasil ditambahkan');
        } else {
            return redirect()->route('berita')->with('error', 'Berita gagal ditambahkan');
        }
    }

    public function destroy($id)
    {
        // Cari berita berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus berita dari database
        $berita->delete();

        // Redirect atau respons yang sesuai
        if ($berita) {
            return redirect()->route('berita')->with('success', 'Berita berhasil dihapus');
        } else {
            return redirect()->route('berita')->with('error', 'Berita gagal dihapus');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'status' => 'required',
            'badge' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
        ]);

        $berita = Berita::findOrFail($id);

        // Handle gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('img-berita', 'public');
            $validatedData['gambar'] = $path;
        }

        $berita->kategori_id = $validatedData['kategori'];
        $berita->status_id = $validatedData['status'];
        $berita->badge_id = $validatedData['badge'];
        $berita->judul = $validatedData['judul'];
        $berita->artikel = $validatedData['artikel'];
        // $berita->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login

        if (isset($validatedData['gambar'])) {
            $berita->gambar = $validatedData['gambar'];
        }

        $berita->save();

        // Redirect atau respons yang sesuai
        if ($berita) {
            return redirect()->route('berita')->with('success', 'Berita berhasil diubah');
        } else {
            return redirect()->route('berita')->with('error', 'Berita gagal diubah');
        }
    }




    // untuk penulis di front-end

    public function storeFront(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'status' => 'required',
            'badge' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
        ]);

        //Handle gambar
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('img-berita', 'public');
            $validatedData['gambar'] = $path;
        }

        $berita = new Berita();
        $berita->kategori_id = $validatedData['kategori'];
        $berita->status_id = $validatedData['status'];
        $berita->badge_id = $validatedData['badge'];
        $berita->judul = $validatedData['judul'];
        $berita->artikel = $validatedData['artikel'];
        $berita->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login

        if (isset($validatedData['gambar'])) {
            $berita->gambar = $validatedData['gambar'];
        }

        $berita->save();

        // Redirect atau respons yang sesuai
        if ($berita) {
            return redirect()->route('profile.view')->with('success', 'Berita berhasil ditambahkan');
        } else {
            return redirect()->route('profile.view')->with('error', 'Berita gagal ditambahkan');
        }
    }

    public function destroyFront($id)
    {
        // Cari berita berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus berita dari database
        $berita->delete();

        // Redirect atau respons yang sesuai
        if ($berita) {
            return redirect()->route('profile.view')->with('success', 'Berita berhasil dihapus');
        } else {
            return redirect()->route('profile.view')->with('error', 'Berita gagal dihapus');
        }
    }

    public function updateFront(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'status' => 'required',
            'badge' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string|max:255',
            'artikel' => 'required|string',
        ]);

        $berita = Berita::findOrFail($id);

        // Handle gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('img-berita', 'public');
            $validatedData['gambar'] = $path;
        }

        $berita->kategori_id = $validatedData['kategori'];
        $berita->status_id = $validatedData['status'];
        $berita->badge_id = $validatedData['badge'];
        $berita->judul = $validatedData['judul'];
        $berita->artikel = $validatedData['artikel'];
        // $berita->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login

        if (isset($validatedData['gambar'])) {
            $berita->gambar = $validatedData['gambar'];
        }

        $berita->save();

        // Redirect atau respons yang sesuai
        if ($berita) {
            return back()->with('success', 'Berita berhasil diubah');
        } else {
            return back()->with('error', 'Berita gagal diubah');
        }
    }
}
