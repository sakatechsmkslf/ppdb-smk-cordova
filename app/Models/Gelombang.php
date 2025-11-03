<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    use HasFactory;

    protected $fillable = [
        'tapel',
        'judul',
        'is_active',
    ];

    /**
     * Relasi ke Pendaftar
     */
    public function pendaftars()
    {
        return $this->hasMany(Pendaftar::class);
    }
}
