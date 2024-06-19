<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langganan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function pembayaran() {
        return $this->belongsTo(Pembayaran::class,'pembayaran_id');
    }
}

