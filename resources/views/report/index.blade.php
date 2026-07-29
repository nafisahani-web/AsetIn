@extends('layouts.app')

@section('title', 'Report')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Laporan Aset</h3>

<p class="text-muted mb-0">
    Lihat dan export laporan data aset.
</p>
        </div>

        <div>
            <a href="{{ route('report.pdf') }}" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf"></i>
                Export PDF
            </a>

            <a href="{{ route('report.excel') }}" class="btn btn-success">
                <i class="bi bi-file-earmark-excel"></i>
                Export Excel
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">
    <tr>
        <th>No</th>
        <th>Kode Aset</th>
        <th>Nama Aset</th>
        <th>Kategori</th>
        <th>Merek</th>
        <th>Lokasi</th>
        <th>Pemasok</th>
        <th>Tanggal Pembelian</th>
        <th>Harga Pembelian</th>
        <th>Status</th>
    </tr>
</thead>
                    <tbody>

    @forelse($assets as $asset)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $asset->kode_aset }}</td>

        <td>{{ $asset->nama_aset }}</td>

        <td>{{ $asset->category->nama_kategori ?? '-' }}</td>

        <td>{{ $asset->brand->nama_brand ?? '-' }}</td>
        <td>{{ $asset->location->nama_lokasi ?? '-' }}</td>

        <td>{{ $asset->supplier->nama_supplier ?? '-' }}</td>

        <td>{{ $asset->tanggal_pembelian }}</td>

        <td>
            Rp {{ number_format($asset->harga_pembelian, 0, ',', '.') }}
        </td>
                           <td>

    @if($asset->status == 'Aktif')

        <span class="badge bg-success">
            Aktif
        </span>

    @elseif($asset->status == 'Dipinjam')

        <span class="badge bg-info">
            Dipinjam
        </span>

    @elseif($asset->status == 'Maintenance')

        <span class="badge bg-warning text-dark">
            Maintenance
        </span>

    @else

        <span class="badge bg-danger">
            Rusak
        </span>

    @endif

</td>
                        </tr>

                        @empty

                        <tr>

                            <td colspan="10" class="text-center">
                                No data available.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection