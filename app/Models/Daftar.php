<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nicolaslopezj\Searchable\SearchableTrait;

class Daftar extends Model
{
    use HasFactory;
    use SearchableTrait;
    #Novan Nur Zulhilmi Yardana - XIU4
    protected $guarded = [];
    // protected $fillable = [
    //     'nama'
    // ];

    protected $casts = [
        'tanggal_daftar' => 'date'
    ];

    protected $searchable = [
        'columns' => [
            'pasiens.no_pasien' => 2,
            'pasiens.nama' => 1,
            'polis.nama' => 3,
        ],
        'joins' => [
            'pasiens' => ['pasiens.id', 'daftars.pasien_id'],
            'polis' => ['polis.id', 'daftars.poli_id'],
        ],
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class)->withDefault();
    }

    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class)->withDefault();
    }
}