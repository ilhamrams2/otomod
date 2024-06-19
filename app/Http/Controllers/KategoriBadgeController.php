<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriBadgeController extends Controller
{

    public function storeKat(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:15',
        ]);

        $kategori = Kategori::create($validatedData);

        if ($kategori) {
            return redirect()->route('kategori')->with('success', 'Kategori Berhasil Ditambah');
        } else {
            return redirect()->route('kategori')->with('error', 'Kategori Gagal Ditambah');
        }
    }
    public function destroyKat($id)
    {

        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        if ($kategori) {
            return redirect()->route('kategori')->with('success', 'Kategori Berhasil Dihapus');
        } else {
            return redirect()->route('kategori')->with('error', 'Kategori Gagal Dihapus');
        }

    }
    public function updateKat(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:15',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validatedData);

        if($kategori){
            return redirect()->route('kategori')->with('success', 'Kategori Berhasil Diubah');
        }else{
            return redirect()->route('kategori')->with('error', 'Kategori Gagal Diubah');
        }
    }




    public function storeBad(Request $request)
    {
        $validatedData = $request->validate([
            'badge' => 'required|max:3',
        ]);

        $badge = Badge::create($validatedData);

        if ($badge) {
            return redirect()->route('kategori')->with('success', 'Badge Berhasil Ditambah');
        } else {
            return redirect()->route('kategori')->with('error', 'Badge Gagal Ditambah');
        }
    }
    public function destroyBad($id)
    {
        $badge = Badge::findOrFail($id);
        $badge->delete();

        if ($badge) {
            return redirect()->route('kategori')->with('success', 'Badge Berhasil Dihapus');
        } else {
            return redirect()->route('kategori')->with('error', 'Badge Gagal Dihapus');
        }
    }
    public function updateBad(Request $request, $id)
    {
        $validatedData = $request->validate([
            'badge' => 'required|max:3',
        ]);

        $badge = Badge::findOrFail($id);
        $badge->update($validatedData);

        if ($badge) {
            return redirect()->route('kategori')->with('success', 'Badge Berhasil Diubah');
        } else {
            return redirect()->route('kategori')->with('error', 'Badge Gagal Diubah');
        }
    }
}
