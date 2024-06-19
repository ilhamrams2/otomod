<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.partials.navbar', function ($view) {
            $kategories =  Kategori::all();
            $users = User::with('status')->where('id', Auth::id())->first();

            $view->with(compact('kategories', 'users'));
        });
    }
}
