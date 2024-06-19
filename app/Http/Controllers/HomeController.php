<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Badge;
use App\Models\Berita;
use App\Models\Status;
use App\Models\Kategori;
use App\Models\Langganan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        $kategories = Kategori::all();
        $badges = Badge::all();

        $beritas = Berita::with('kategori', 'badge', 'user', 'status')
            ->latest()
            ->get();
        $randomBeritas = Berita::with('kategori', 'user', 'badge', 'status')
            ->inRandomOrder()
            ->take(10)
            ->get();

        $latestBeritasByKategori = Berita::with('kategori', 'badge', 'user', 'status')
            ->whereIn('kategori_id', [1, 2, 3, 4, 5])
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('kategori_id');

        $beritaKat1 = $latestBeritasByKategori->get(1)?->first();
        $beritaKat2 = $latestBeritasByKategori->get(2)?->first();
        $beritaKat3 = $latestBeritasByKategori->get(3)?->first();
        $beritaKat4 = $latestBeritasByKategori->get(4)?->first();
        $beritaKat5 = $latestBeritasByKategori->get(5)?->first();

        return view('frontend.pages.homePage', [
            'users' => $users,
            'kategories' => $kategories,
            'badges' => $badges,
            'beritas' => $beritas,
            'randomBeritas' => $randomBeritas,
            'beritaKat1' => $beritaKat1,
            'beritaKat2' => $beritaKat2,
            'beritaKat3' => $beritaKat3,
            'beritaKat4' => $beritaKat4,
            'beritaKat5' => $beritaKat5,
        ])->with('title', 'Home');
    }

    public function kategoriView($kategori)
    {

        $kategories = Kategori::where('kategori', $kategori)->first();
        if (Auth::check()) {
        }
        $beritas = Berita::with('kategori', 'badge', 'user')->where('kategori_id', $kategories->id)->latest()->get();


        return view('frontend.pages.kategori', [

            'beritas' => $beritas,
            'kategori' => $kategories,

        ])->with('title', $kategories->kategori);
    }

    public function detail($id)
    {

        $berita = Berita::with(['kategori', 'badge', 'user', 'status'])->findOrFail($id);
        $randomBeritas = Berita::with('kategori', 'user', 'badge', 'status')
            ->inRandomOrder()
            ->take(9)
            ->get();
        $beritaKategories = Berita::with('kategori', 'user', 'badge', 'status')->where('kategori_id', $berita->kategori->id)->inRandomOrder()->take(5)->get();
        $kategories = Kategori::all();
        $badges = Badge::all();
        $statues = Status::all();

        return view('frontend.pages.detail', [

            'berita' => $berita,
            'kategories' => $kategories,
            'statues' => $statues,
            'badges' => $badges,
            'randomBeritas' => $randomBeritas,
            'beritaKategories' => $beritaKategories,

        ])->with('title', 'detail');
    }

    public function profile()
    {
        $userId = Auth::id();
        $beritas = Berita::with('kategori', 'badge', 'user')->where('status_id', 2)->latest()->get();
        $myBeritas = Berita::with('kategori', 'badge', 'user')->where('user_id', $userId)->latest()->get();
        $user = User::with('role', 'status')->where('id', $userId)->firstOrFail();
        $kategories = Kategori::all();
        $badges = Badge::all();
        $statues = Status::all();
        $pembayarans = Pembayaran::all();

        return view('frontend.pages.profile', compact('user', 'beritas', 'kategories', 'badges', 'statues', 'myBeritas', 'pembayarans'))->with('title', $user->name);
    }

    public function updateProfile(Request $request, $id)
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
            return redirect()->route('profile.view')->with('success', 'profile berhasil diperbaharui');
        } else {
            return redirect()->route('profile.view')->with('error', 'profile gagal diperbaharui');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Pencarian sederhana berdasarkan judul berita
        $beritas = Berita::where('judul', 'like', "%{$query}%")
            ->orWhere('artikel', 'like', "%{$query}%")
            ->get();

        return view('frontend.pages.search', compact('beritas', 'query'))->with('title', $query);;
    }

    public function storeLangganan(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id|unique:langganans,user_id',
            'pembayaran_id' => 'required|exists:pembayarans,id',
            'no_tlpn' => 'required|max:12|unique:langganans,no_tlpn',
        ], [
            'user_id.exists' => 'User dengan ID yang dimasukkan tidak ditemukan.',
            'user_id.unique' => 'User sudah memiliki langganan aktif.',
            'pembayaran_id.exists' => 'Metode pembayaran yang dipilih tidak valid.',
            'no_tlpn.required' => 'Nomor telepon wajib diisi.',
            'no_tlpn.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'no_tlpn.unique' => 'Nomor telepon sudah digunakan untuk langganan lain.',
        ]);

        try {
            // Simpan data langganan
            $langganan = Langganan::create($validatedData);

            // Set status pengguna menjadi "Premium" (status_id: 2)
            $user = User::find($validatedData['user_id']);

            if ($user) {
                $user->status_id = 2; // Mengubah status pengguna menjadi "premium"
                $user->save();

                return redirect()->back()->with('success', 'Langganan berhasil, anda dapat melihat konten eksklusif kami.');
            } else {
                return redirect()->back()->with('error', 'Gagal menemukan pengguna yang terkait dengan langganan ini.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroyBerita($id)
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
            return redirect('/')->with('success', 'Berita berhasil dihapus');
        } else {
            return redirect('/')->with('error', 'Berita gagal dihapus');
        }
    }
}
