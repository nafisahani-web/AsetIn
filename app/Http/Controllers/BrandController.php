<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Menampilkan daftar brand
     */
    public function index()
    {
        $brands = Brand::latest()->get();

        return view('brand.index', compact('brands'));
    }

    /**
     * Form create (tidak digunakan karena memakai modal)
     */
    public function create()
    {
        //
    }

    /**
     * Simpan brand baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_brand' => 'required|unique:brands,nama_brand|max:100',
            'deskripsi'  => 'nullable'
        ]);

        Brand::create([
            'nama_brand' => $request->nama_brand,
            'deskripsi'  => $request->deskripsi,
        ]);

        return redirect()
            ->route('brand.index')
            ->with('success', 'Brand berhasil ditambahkan.');
    }

    /**
     * Detail brand (belum digunakan)
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Form edit (tidak digunakan karena memakai modal)
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update brand
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'nama_brand' => 'required|max:100|unique:brands,nama_brand,' . $brand->id,
            'deskripsi'  => 'nullable'
        ]);

        $brand->update([
            'nama_brand' => $request->nama_brand,
            'deskripsi'  => $request->deskripsi,
        ]);

        return redirect()
            ->route('brand.index')
            ->with('success', 'Brand berhasil diperbarui.');
    }

    /**
     * Hapus brand
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brand.index')
            ->with('success', 'Brand berhasil dihapus.');
    }
}