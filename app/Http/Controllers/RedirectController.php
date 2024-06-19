<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek(){
        if (!auth()->user()) {
            return redirect('/login');
        }else{
            return redirect('/home');
        }
    }
}
