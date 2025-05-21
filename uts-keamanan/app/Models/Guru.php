<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama', 'nip', 'email', 'alamat', 'telepon', 'foto'
    ];
}