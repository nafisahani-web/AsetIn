<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Asset extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'supplier_id',
        'location_id',
        'kode_aset',
        'nama_aset',
        'no_seri',
        'tanggal_pembelian',
        'harga_pembelian',
        'kondisi',
        'status',
        'deskripsi'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

   public function warranty()
{
    return $this->hasOne(Warranty::class);
}

    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}