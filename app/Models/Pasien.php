<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Daftar extends Model
{
    use HasFactory;

    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    /**
     * Get the pasien associated with the daftar.
     */
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }

    /**
     * Get the poli associated with the daftar.
     */
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class);
    }
}

