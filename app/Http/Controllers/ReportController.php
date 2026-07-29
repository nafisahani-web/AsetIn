<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Exports\AssetsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $assets = Asset::with([
            'category',
            'brand',
            'supplier',
            'location'
        ])->get();

        return view('report.index', compact('assets'));
    }

    public function exportPdf()
    {
        $assets = Asset::with([
            'category',
            'brand',
            'supplier',
            'location'
        ])->get();

        $pdf = Pdf::loadView('report.pdf', compact('assets'));

        return $pdf->download('Laporan_Aset.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new AssetsExport, 'Laporan_Aset.xlsx');
    }
}