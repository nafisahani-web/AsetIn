<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssetsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Asset::with([
            'category',
            'brand',
            'supplier',
            'location'
        ])->get()->map(function ($asset) {
            return [
                $asset->kode_aset,
                $asset->nama_aset,
                $asset->category->nama_kategori ?? '-',
                $asset->brand->nama_brand ?? '-',
                $asset->location->nama_lokasi ?? '-',
                $asset->supplier->nama_supplier ?? '-',
                $asset->tanggal_pembelian,
                $asset->harga_pembelian,
                $asset->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Kode Aset',
            'Nama Aset',
            'Kategori',
            'Merek',
            'Lokasi',
            'Pemasok',
            'Tanggal Pembelian',
            'Harga Pembelian',
            'Status',
        ];
    }
}