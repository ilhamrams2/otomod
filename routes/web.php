<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    AuthController,
    HomeController,
    BeritaController,
    PenulisController,
    ProfileController,
    PenggunaController,
    RedirectController,
    DashboardController,
    LanggananController,
    KategoriBadgeController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/generate', function () {
    $publicStoragePath = public_path('storage');

    // Cek apakah symbolic link sudah ada
    if (File::exists($publicStoragePath)) {
        // Hapus symbolic link yang sudah ada
        File::delete($publicStoragePath);
    }

    // Buat symbolic link baru
    Artisan::call('storage:link');

    redirect()->back();
});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['route.not.found', 'block.manual.access']], function () {

    Route::get('/error', function () {
        return view('error'); // Buatlah view 'error.blade.php' untuk halaman error
    })->name('error.page');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'dologin'])->name('login');
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'store'])->name('register');
    });

    Route::group(['middleware' => ['auth', 'admin', 'block.manual.access'], 'prefix' => 'dashboard'], function () {

        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::group(['prefix' => 'kategori', 'as' => 'kategori',], function () {
            Route::get('/', [DashboardController::class, 'kategori']);
            Route::post('/', [KategoriBadgeController::class, 'storeKat'])->name('.store');
            Route::delete('/{id}', [KategoriBadgeController::class, 'destroyKat'])->name('.destroy');
            Route::put('/{id}', [KategoriBadgeController::class, 'updateKat'])->name('.update');
        });

        Route::group(['prefix' => 'badge', 'as' => 'badge',], function () {
            // Badge
            Route::post('/', [KategoriBadgeController::class, 'storeBad'])->name('.store');
            Route::delete('/{id}', [KategoriBadgeController::class, 'destroyBad'])->name('.destroy');
            Route::put('/{id}', [KategoriBadgeController::class, 'updateBad'])->name('.update');
        });

        // Berita
        Route::group(['prefix' => 'berita', 'as' => 'berita',], function () {
            Route::get('/', [DashboardController::class, 'berita']);
            Route::get('/{id}', [BeritaController::class, 'detail'])->name('.detail');
            Route::post('/', [BeritaController::class, 'store'])->name('.store');
            Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('.destroy');
            Route::put('/{id}', [BeritaController::class, 'update'])->name('.update');
        });

        // profile
        Route::group(['prefix' => 'profile', 'as' => 'profile',], function () {
            Route::get('/', [DashboardController::class, 'profile']);
            Route::put('/{id}', [ProfileController::class, 'update'])->name('.update');
        });

        // Penulis
        Route::group(['prefix' => 'penulis', 'as' => 'penulis',], function () {
            Route::get('/', [DashboardController::class, 'penulis']);
            Route::post('/', [PenulisController::class, 'store'])->name('.store');
            Route::delete('/{id}', [PenulisController::class, 'destroy'])->name('.destroy');
            Route::put('/{id}', [PenulisController::class, 'update'])->name('.update');
        });

        // pengguna
        Route::group(['prefix' => 'pengguna', 'as' => 'pengguna',], function () {
            Route::get('/', [DashboardController::class, 'pengguna']);
            Route::post('/', [PenggunaController::class, 'store'])->name('.store');
            Route::delete('/{id}', [PenggunaController::class, 'destroy'])->name('.destroy');
            Route::put('/{id}', [PenggunaController::class, 'update'])->name('.update');
        });

        // langganan
        Route::group(['prefix' => 'langganan', 'as' => 'langganan',], function () {
            Route::get('/', [DashboardController::class, 'langganan']);
            Route::post('/', [LanggananController::class, 'store'])->name('.store');
            Route::delete('/{id}', [LanggananController::class, 'destroy'])->name('.destroy');
            Route::put('/{id}', [LanggananController::class, 'update'])->name('.update');
        });
    });


    Route::group(['middleware' => ['auth', 'block.manual.access']], function () {
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile.view');
        Route::put('/profile/{id}', [HomeController::class, 'updateProfile'])->name('profile.update.front');
        Route::post('/langganan', [HomeController::class, 'storeLangganan'])->name('langganan.store.front');

        Route::post('/berita', [BeritaController::class, 'storeFront'])->name('storeFront');
        Route::delete('/berita/{id}', [BeritaController::class, 'destroyFront'])->name('destroyFront');
        Route::put('/berita/{id}', [BeritaController::class, 'updateFront'])->name('updateFront');
        Route::get('/berita/search', [HomeController::class, 'search'])->name('berita.search');


    });
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('berita.detail.view')->middleware(['detail', 'langganan']);
    Route::get('/kategori/{kategori}', [HomeController::class, 'kategoriView'])->name('kategori.view')->middleware(['block.manual.access']);
});
