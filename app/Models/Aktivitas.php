<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table = 'aktivitas';
    protected $fillable = ['nama_aktivitas', 'alamat', 'deskripsi', 'tanggal', 'status'];
}