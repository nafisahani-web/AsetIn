<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar category
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('category.index', compact('categories'));
    }

    /**
     * Form create (tidak digunakan karena memakai modal)
     */
    public function create()
    {
        //
    }

    /**
     * Simpan category baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:categories,nama_kategori|max:255',
            'deskripsi'      => 'nullable'
        ]);

        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category berhasil ditambahkan.');
    }

    /**
     * Detail category (belum digunakan)
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Form edit (tidak digunakan karena memakai modal)
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update data category
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required|max:255|unique:categories,nama_kategori,' . $category->id,
            'deskripsi'     => 'nullable'
        ]);

        $category->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category berhasil diperbarui.');
    }

    /**
     * Hapus category
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'Category berhasil dihapus.');
    }
}