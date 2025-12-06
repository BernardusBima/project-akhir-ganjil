<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    // Tambahan: Supaya nanti bisa panggil nama kelasnya
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}