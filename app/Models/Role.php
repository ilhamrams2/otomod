<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Role extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public Function users(){
        return $this->hasMany(User::class);
    }
}
