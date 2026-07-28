<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $fillable = [
        'nama_brand',
        'deskripsi'
    ];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }
}