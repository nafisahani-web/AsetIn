<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    protected $fillable = [
        'asset_id',
        'no_garansi',
        'tanggal_mulai',
        'tanggal_berakhir',
        'status',
        'deskripsi',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}