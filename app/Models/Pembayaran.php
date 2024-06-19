<?php

namespace App\Models;

use App\Models\Langganan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public Function langganans(){
        return $this->hasMany(Langganan::class);
    }
}
