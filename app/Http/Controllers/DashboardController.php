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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlahPengguna = User::where('role_id', '3')->count();
        $jumlahPenulis = User::where('role_id', '2')->count();
        $jumlahBeritaPremium = Berita::where('status_id', '2')->count();
        $jumlahLangganan = Langganan::count();
        $jumlahArtikelBaru = Berita::where('created_at', '>=', now()->subMonth())->count();
        $pembayaran = Pembayaran::select('harga')->first();

        // Pastikan harga langganan dikonversi ke integer
        $hargaLangganan = $pembayaran ? intval($pembayaran->harga) : 0;

        // Contoh perhitungan jumlah langganan
        $jumlahLangganan = Langganan::count();

        // Hitung jumlah pendapatan
        $jumlahPendapatan = $jumlahLangganan * $hargaLangganan;

        // Format jumlah pendapatan ke dalam format Rupiah
        $formattedJumlahPendapatan = 'Rp. ' . number_format($jumlahPendapatan, 0, ',', '.');

        return view('backend.pages.dashboard', compact('jumlahPengguna', 'jumlahPenulis', 'jumlahLangganan', 'jumlahArtikelBaru','formattedJumlahPendapatan','jumlahBeritaPremium'));
    }

    public function kategori()
    {

        $kategories = Kategori::all();
        $badges = Badge::all();

        return view('backend.pages.kategori', [
            'kategories' => $kategories,
            'badges' => $badges,
        ]);
    }

    public function berita()
    {

        $beritas = Berita::with('kategori', 'badge', 'user', 'status')->latest()->get();

        $kategories = Kategori::all();
        $badges = Badge::all();
        $statues = Status::all();

        return view('backend.pages.berita', [
            'beritas' => $beritas,
            'kategories' => $kategories,
            'badges' => $badges,
            'statues' => $statues,
        ]);
    }

    public function profile()
    {

        $userId = Auth::id();

        $user = User::with('role', 'status')->where('id', $userId)->firstOrFail();

        return view('backend.pages.profile', compact('user'));
    }

    public function penulis()
    {

        $allPenulis = User::with('role', 'status')->where('role_id', 2)->get();

        return view('backend.pages.penulis', compact('allPenulis'));
    }

    public function pengguna()
    {

        $allPengguna = User::with('role', 'status')->where('role_id', 3)->get();

        return view('backend.pages.pengguna', compact('allPengguna'));
    }

    public function langganan()
    {

        $langganans = Langganan::with('pembayaran', 'user')->get();

        $users = User::with('role', 'status')->where('role_id', 3)->get();

        $pembayarans = Pembayaran::all();


        return view('backend.pages.langganan', compact('langganans'), [
            'users' => $users,
            'pembayarans' => $pembayarans,
        ]);
    }
}
