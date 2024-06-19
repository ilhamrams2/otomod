<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $guard = ['id'];

    public Function users(){
        return $this->hasMany(User::class);
    }
    public function beritas(){
        return $this->hasMany(Berita::class);
    }
}
