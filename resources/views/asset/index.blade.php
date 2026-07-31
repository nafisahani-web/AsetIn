@extends('layouts.app')

@section('title', 'Asset')

@section('content')

<div class="container-fluid">

    {{-- Error Validation --}}
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">

        <strong>Terjadi kesalahan!</strong>

        <ul class="mt-2 mb-0">

            @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">

            Daftar Asset

        </h3>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalTambahAsset">

            <i class="bi bi-plus-circle"></i>

            Tambah Asset

        </button>

    </div>

    <div class="card shadow-sm border-0">

    <div class="card-body">

        <div class="table-responsive">

            <table
                id="assetTable"
                class="table table-hover align-middle w-100">

                <thead class="table-dark">
<tr>
    <th>No</th>
    <th>Kode Asset</th>
    <th>Nama Asset</th>
    <th>Category</th>
    <th>Brand</th>
    <th>Supplier</th>
    <th>Location</th>
    <th>Kondisi</th>
    <th>Status</th>
    <th class="text-center">Aksi</th>
</tr>
</thead>

                <tbody>

                @forelse($assets as $asset)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <span class="badge bg-primary">
                            {{ $asset->kode_aset }}
                        </span>
                    </td>

                    <td>

                        <strong>{{ $asset->nama_aset }}</strong>

                        <br>

                        <small class="text-muted">

                            SN :
                            {{ $asset->no_seri }}

                        </small>

                    </td>

                    <td>

                        {{ $asset->category->nama_kategori }}

                    </td>

                    <td>

                        {{ $asset->brand->nama_brand }}

                    </td>

                    <td>

                        {{ $asset->supplier->nama_supplier }}

                    </td>

                    <td>

                        {{ $asset->location->nama_lokasi }}

                    </td>

                    <td>

                        @if($asset->kondisi=='Baik')

                        <span class="badge bg-success">
                            Baik
                        </span>

                        @elseif($asset->kondisi=='Rusak Ringan')

                        <span class="badge bg-warning text-dark">
                            Rusak Ringan
                        </span>

                        @else

                        <span class="badge bg-danger">
                            Rusak Berat
                        </span>

                        @endif

                    </td>

<td>

    @if($asset->status == 'Aktif')
        <span class="badge bg-success">Aktif</span>

    @elseif($asset->status == 'Dipinjam')
        <span class="badge bg-info">Dipinjam</span>

    @elseif($asset->status == 'Maintenance')
        <span class="badge bg-warning text-dark">Maintenance</span>

    @else
        <span class="badge bg-danger">Rusak</span>
    @endif

</td>
                    <td class="text-center">

                        <button
                            class="btn btn-warning btn-sm me-1"
                            data-bs-toggle="modal"
                            data-bs-target="#editAsset{{ $asset->id }}">

                            <i class="bi bi-pencil-square"></i>

                        </button>

                        <form
                            action="{{ route('asset.destroy',$asset->id) }}"
                            method="POST"
                            class="d-inline form-delete">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty
        
                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- ===========================
     MODAL TAMBAH ASSET
============================ --}}

<div
    class="modal fade"
    id="modalTambahAsset"
    tabindex="-1">

    <div class="modal-dialog modal-lg">

        <form
            action="{{ route('asset.store') }}"
            method="POST">

            @csrf

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Tambah Asset

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nama Asset

                            </label>

                            <input
                                type="text"
                                name="nama_aset"
                                class="form-control"
                                value="{{ old('nama_aset') }}"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                No Seri

                            </label>

                            <input
                                type="text"
                                name="no_seri"
                                class="form-control"
                                value="{{ old('no_seri') }}"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Category

                            </label>

                            <select
                                name="category_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Category --
                                </option>

                                @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}">

                                    {{ $category->nama_kategori }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Brand

                            </label>

                            <select
                                name="brand_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Brand --
                                </option>

                                @foreach($brands as $brand)

                                <option
                                    value="{{ $brand->id }}">

                                    {{ $brand->nama_brand }}

                                </option>

                                @endforeach

                            </select>

                        </div>
                                                <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Supplier

                            </label>

                            <select
                                name="supplier_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Supplier --
                                </option>

                                @foreach($suppliers as $supplier)

                                <option
                                    value="{{ $supplier->id }}">

                                    {{ $supplier->nama_supplier }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Location

                            </label>

                            <select
                                name="location_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Location --
                                </option>

                                @foreach($locations as $location)

                                <option
                                    value="{{ $location->id }}">

                                    {{ $location->nama_lokasi }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Tanggal Pembelian

                            </label>

                            <input
                                type="date"
                                name="tanggal_pembelian"
                                class="form-control"
                                value="{{ old('tanggal_pembelian') }}"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Harga Pembelian

                            </label>

                            <input
                                type="number"
                                name="harga_pembelian"
                                class="form-control"
                                min="0"
                                value="{{ old('harga_pembelian') }}"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Kondisi

                            </label>

                            <select
                                name="kondisi"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Kondisi --
                                </option>

                                <option value="Baik">
                                    Baik
                                </option>

                                <option value="Rusak Ringan">
                                    Rusak Ringan
                                </option>

                                <option value="Rusak Berat">
                                    Rusak Berat
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Status

                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Status --
                                </option>

                                <option value="Aktif">
                                    Aktif
                                </option>

                                <option value="Dipinjam">
                                    Dipinjam
                                </option>

                                <option value="Maintenance">
                                    Maintenance
                                </option>

                                <option value="Rusak">
                                    Rusak
                                </option>

                            </select>

                        </div>

                        <div class="col-12 mb-3">

                            <label class="form-label">

                                Deskripsi

                            </label>

                            <textarea
                                name="deskripsi"
                                class="form-control"
                                rows="4">{{ old('deskripsi') }}</textarea>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle"></i>

                        Simpan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

{{-- ===========================
     MODAL EDIT ASSET
=========================== --}}

@foreach($assets as $asset)

<div
    class="modal fade"
    id="editAsset{{ $asset->id }}"
    tabindex="-1">

    <div class="modal-dialog modal-lg">

        <form
            action="{{ route('asset.update',$asset->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Edit Asset

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Kode Asset

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $asset->kode_aset }}"
                                readonly>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Nama Asset

                            </label>

                            <input
                                type="text"
                                name="nama_aset"
                                class="form-control"
                                value="{{ $asset->nama_aset }}"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                No Seri

                            </label>

                            <input
                                type="text"
                                name="no_seri"
                                class="form-control"
                                value="{{ $asset->no_seri }}"
                                required>

                        </div>
                                                <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <select
                                name="category_id"
                                class="form-select"
                                required>

                                @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ $asset->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->nama_kategori }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Brand
                            </label>

                            <select
                                name="brand_id"
                                class="form-select"
                                required>

                                @foreach($brands as $brand)

                                <option
                                    value="{{ $brand->id }}"
                                    {{ $asset->brand_id == $brand->id ? 'selected' : '' }}>

                                    {{ $brand->nama_brand }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Supplier
                            </label>

                            <select
                                name="supplier_id"
                                class="form-select"
                                required>

                                @foreach($suppliers as $supplier)

                                <option
                                    value="{{ $supplier->id }}"
                                    {{ $asset->supplier_id == $supplier->id ? 'selected' : '' }}>

                                    {{ $supplier->nama_supplier }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Location
                            </label>

                            <select
                                name="location_id"
                                class="form-select"
                                required>

                                @foreach($locations as $location)

                                <option
                                    value="{{ $location->id }}"
                                    {{ $asset->location_id == $location->id ? 'selected' : '' }}>

                                    {{ $location->nama_lokasi }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal Pembelian
                            </label>

                            <input
                                type="date"
                                name="tanggal_pembelian"
                                class="form-control"
                                value="{{ $asset->tanggal_pembelian }}"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Harga Pembelian
                            </label>

                            <input
                                type="number"
                                name="harga_pembelian"
                                class="form-control"
                                min="0"
                                value="{{ $asset->harga_pembelian }}"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kondisi
                            </label>

                            <select
                                name="kondisi"
                                class="form-select"
                                required>

                                <option value="Baik"
                                    {{ $asset->kondisi=='Baik' ? 'selected' : '' }}>
                                    Baik
                                </option>

                                <option value="Rusak Ringan"
                                    {{ $asset->kondisi=='Rusak Ringan' ? 'selected' : '' }}>
                                    Rusak Ringan
                                </option>

                                <option value="Rusak Berat"
                                    {{ $asset->kondisi=='Rusak Berat' ? 'selected' : '' }}>
                                    Rusak Berat
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select
                                name="status"
                                class="form-select"
                                required>

                                <option value="Aktif"
                                    {{ $asset->status=='Aktif' ? 'selected' : '' }}>
                                    Aktif
                                </option>

                                <option value="Dipinjam"
                                    {{ $asset->status=='Dipinjam' ? 'selected' : '' }}>
                                    Dipinjam
                                </option>

                                <option value="Maintenance"
                                    {{ $asset->status=='Maintenance' ? 'selected' : '' }}>
                                    Maintenance
                                </option>

                                <option value="Rusak"
                                    {{ $asset->status=='Rusak' ? 'selected' : '' }}>
                                    Rusak
                                </option>

                            </select>

                        </div>

                        <div class="col-12 mb-3">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="deskripsi"
                                class="form-control"
                                rows="4">{{ $asset->deskripsi }}</textarea>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="bi bi-check-circle"></i>

                        Update

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endforeach

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    new DataTable('#assetTable', {

    autoWidth: false,

    language: {
        search: "Cari :",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        infoEmpty: "Belum ada data",
        zeroRecords: "Data tidak ditemukan",
        paginate: {
            previous: "Sebelumnya",
            next: "Berikutnya"
        }
    }

});

    document.querySelectorAll('.form-delete').forEach(form => {

        form.addEventListener('submit', function(e){

            e.preventDefault();

            Swal.fire({

                title:'Hapus Asset?',

                text:'Data yang dihapus tidak dapat dikembalikan.',

                icon:'warning',

                showCancelButton:true,

                confirmButtonColor:'#d33',

                cancelButtonColor:'#6c757d',

                confirmButtonText:'Ya, Hapus',

                cancelButtonText:'Batal'

            }).then((result)=>{

                if(result.isConfirmed){

                    form.submit();

                }

            });

        });

    });

});
</script>

@if(session('success'))

<script>

document.addEventListener("DOMContentLoaded",function(){

    Swal.fire({

        icon:'success',

        title:'Berhasil',

        text:'{{ session("success") }}',

        confirmButtonColor:'#0d6efd'

    });

});

</script>

@endif

@if($errors->any())

<script>

document.addEventListener("DOMContentLoaded",function(){

    let modal = new bootstrap.Modal(document.getElementById('modalTambahAsset'));

    modal.show();

});

</script>

@endif

@endpush