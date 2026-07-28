<?php

namespace App\Http\Controllers;

use App\Models\Warranty;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WarrantyController extends Controller
{
    public function index()
    {
        $warranties = Warranty::with('asset')->latest()->get();

        $assets = Asset::whereDoesntHave('warranty')->get();

        return view('warranty.index', compact(
            'warranties',
            'assets'
        ));
    }
        public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|unique:warranties,asset_id',
            'no_garansi' => 'required|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable',
        ]);

        $status = now()->toDateString() <= $request->tanggal_berakhir
            ? 'Aktif'
            : 'Berakhir';

        Warranty::create([
            'asset_id' => $request->asset_id,
            'no_garansi' => $request->no_garansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'status' => $status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('warranty.index')
            ->with('success', 'Data garansi berhasil ditambahkan.');
    }
        public function update(Request $request, Warranty $warranty)
    {
        $request->validate([
            'asset_id' => [
                'required',
                Rule::unique('warranties', 'asset_id')->ignore($warranty->id),
            ],
            'no_garansi' => 'required|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'nullable',
        ]);

        $status = now()->toDateString() <= $request->tanggal_berakhir
            ? 'Aktif'
            : 'Berakhir';

        $warranty->update([
            'asset_id' => $request->asset_id,
            'no_garansi' => $request->no_garansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'status' => $status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('warranty.index')
            ->with('success', 'Data garansi berhasil diperbarui.');
    }

    public function destroy(Warranty $warranty)
    {
        $warranty->delete();

        return redirect()->route('warranty.index')
            ->with('success', 'Data garansi berhasil dihapus.');
    }
}