<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::with(['asset', 'user'])
            ->latest()
            ->get();

        $assets = Asset::all();

        return view('maintenance.index', compact('maintenances', 'assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'tanggal_maintenance' => 'required|date',
            'jenis_maintenance' => 'required|string|max:100',
            'biaya' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        Maintenance::create([
            'asset_id' => $request->asset_id,
            'user_id' => Auth::id(),
            'tanggal_maintenance' => $request->tanggal_maintenance,
            'jenis_maintenance' => $request->jenis_maintenance,
            'biaya' => $request->biaya,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('maintenance.index')
            ->with('success', 'Data maintenance berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'tanggal_maintenance' => 'required|date',
            'jenis_maintenance' => 'required|string|max:100',
            'biaya' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $maintenance->update([
            'asset_id' => $request->asset_id,
            'tanggal_maintenance' => $request->tanggal_maintenance,
            'jenis_maintenance' => $request->jenis_maintenance,
            'biaya' => $request->biaya,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('maintenance.index')
            ->with('success', 'Data maintenance berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()
            ->route('maintenance.index')
            ->with('success', 'Data maintenance berhasil dihapus.');
    }
}