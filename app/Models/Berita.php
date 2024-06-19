<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    public function status() {
        return $this->belongsTo(Status::class,'status_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    public function badge() {
        return $this->belongsTo(Badge::class,'badge_id');
    }
}
