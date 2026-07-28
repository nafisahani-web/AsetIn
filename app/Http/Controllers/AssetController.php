<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Location;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Menampilkan daftar asset
     */
    public function index()
    {
        $assets = Asset::with([
            'category',
            'brand',
            'supplier',
            'location'
        ])->latest()->get();

        $categories = Category::orderBy('nama_kategori')->get();
        $brands = Brand::orderBy('nama_brand')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();
        $locations = Location::orderBy('nama_lokasi')->get();

        return view('asset.index', compact(
            'assets',
            'categories',
            'brands',
            'suppliers',
            'locations'
        ));
    }

    /**
     * Form create (tidak digunakan karena memakai modal)
     */
    public function create()
    {
        //
    }

    /**
     * Simpan asset baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'         => 'required|exists:categories,id',
            'brand_id'            => 'required|exists:brands,id',
            'supplier_id'         => 'required|exists:suppliers,id',
            'location_id'         => 'required|exists:locations,id',

            'nama_aset'           => 'required|max:100',
            'no_seri'             => 'required|max:100|unique:assets,no_seri',

            'tanggal_pembelian'   => 'required|date',

            'harga_pembelian'     => 'required|numeric|min:0',

            'kondisi'             => 'required',

            'status'              => 'required',

            'deskripsi'           => 'nullable'
        ]);

        $lastAsset = Asset::latest('id')->first();

        if (!$lastAsset) {
            $kode = 'AST-0001';
        } else {

            $nomor = (int) substr($lastAsset->kode_aset, 4);

            $kode = 'AST-' . str_pad($nomor + 1, 4, '0', STR_PAD_LEFT);
        }

        Asset::create([

            'kode_aset'         => $kode,

            'category_id'       => $request->category_id,
            'brand_id'          => $request->brand_id,
            'supplier_id'       => $request->supplier_id,
            'location_id'       => $request->location_id,

            'nama_aset'         => $request->nama_aset,
            'no_seri'           => $request->no_seri,

            'tanggal_pembelian' => $request->tanggal_pembelian,

            'harga_pembelian'   => $request->harga_pembelian,

            'kondisi'           => $request->kondisi,

            'status'            => $request->status,

            'deskripsi'         => $request->deskripsi

        ]);

        return redirect()
            ->route('asset.index')
            ->with('success', 'Asset berhasil ditambahkan.');
    }

    /**
     * Detail asset (belum digunakan)
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Form edit (tidak digunakan karena memakai modal)
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update asset
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([

            'category_id'         => 'required|exists:categories,id',
            'brand_id'            => 'required|exists:brands,id',
            'supplier_id'         => 'required|exists:suppliers,id',
            'location_id'         => 'required|exists:locations,id',

            'nama_aset'           => 'required|max:100',

            'no_seri'             => 'required|max:100|unique:assets,no_seri,' . $asset->id,

            'tanggal_pembelian'   => 'required|date',

            'harga_pembelian'     => 'required|numeric|min:0',

            'kondisi'             => 'required',

            'status'              => 'required',

            'deskripsi'           => 'nullable'

        ]);

        $asset->update([

            'category_id'       => $request->category_id,
            'brand_id'          => $request->brand_id,
            'supplier_id'       => $request->supplier_id,
            'location_id'       => $request->location_id,

            'nama_aset'         => $request->nama_aset,

            'no_seri'           => $request->no_seri,

            'tanggal_pembelian' => $request->tanggal_pembelian,

            'harga_pembelian'   => $request->harga_pembelian,

            'kondisi'           => $request->kondisi,

            'status'            => $request->status,

            'deskripsi'         => $request->deskripsi

        ]);

        return redirect()
            ->route('asset.index')
            ->with('success', 'Asset berhasil diperbarui.');
    }

    /**
     * Hapus asset
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()
            ->route('asset.index')
            ->with('success', 'Asset berhasil dihapus.');
    }
}