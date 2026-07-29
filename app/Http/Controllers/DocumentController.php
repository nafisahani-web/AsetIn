<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with(['asset', 'user'])
            ->latest()
            ->get();

        $assets = Asset::orderBy('nama_aset')->get();

        return view('document.index', compact('documents', 'assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('document.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'nama_dokumen' => 'required|string|max:100',
            'jenis_dokumen' => 'required|string|max:100',
            'tanggal_unggah' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:10240',
        ]);

        $path = $request->file('file')->store('documents', 'public');

        Document::create([
            'asset_id' => $request->asset_id,
            'user_id' => Auth::id(),
            'nama_dokumen' => $request->nama_dokumen,
            'jenis_dokumen' => $request->jenis_dokumen,
            'lokasi_file' => $path,
            'tanggal_unggah' => $request->tanggal_unggah,
        ]);

        return redirect()
            ->route('document.index')
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
{
    $extension = pathinfo($document->lokasi_file, PATHINFO_EXTENSION);

    $filename = $document->nama_dokumen . '.' . $extension;

    return Storage::disk('public')->download(
        $document->lokasi_file,
        $filename
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return response()->json($document);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'nama_dokumen' => 'required|string|max:100',
            'jenis_dokumen' => 'required|string|max:100',
            'tanggal_unggah' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png|max:10240',
        ]);

        $path = $document->lokasi_file;

        if ($request->hasFile('file')) {

            if (
                $document->lokasi_file &&
                Storage::disk('public')->exists($document->lokasi_file)
            ) {
                Storage::disk('public')->delete($document->lokasi_file);
            }

            $path = $request->file('file')->store('documents', 'public');
        }

        $document->update([
            'asset_id' => $request->asset_id,
            'nama_dokumen' => $request->nama_dokumen,
            'jenis_dokumen' => $request->jenis_dokumen,
            'lokasi_file' => $path,
            'tanggal_unggah' => $request->tanggal_unggah,
        ]);

        return redirect()
            ->route('document.index')
            ->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if (
            $document->lokasi_file &&
            Storage::disk('public')->exists($document->lokasi_file)
        ) {
            Storage::disk('public')->delete($document->lokasi_file);
        }

        $document->delete();

        return redirect()
            ->route('document.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }
}