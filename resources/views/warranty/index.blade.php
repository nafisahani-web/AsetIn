@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">
            <i class="bi bi-shield-check me-2"></i>
            Data Warranty
        </h3>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-circle"></i>
            Tambah Warranty
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-striped" id="warrantyTable">

                <thead class="table-dark">

                    <tr>

                        <th width="5%">No</th>
                        <th>Nama Asset</th>
                        <th>No Garansi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($warranties as $warranty)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $warranty->asset->nama_aset }}</td>

                        <td>{{ $warranty->no_garansi }}</td>

                        <td>{{ $warranty->tanggal_mulai }}</td>

                        <td>{{ $warranty->tanggal_berakhir }}</td>

                        <td>

                            @if($warranty->status == 'Aktif')

                                <span class="badge bg-success">
                                    Aktif
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Berakhir
                                </span>

                            @endif

                        </td>

                        <td>

                            <button
    class="btn btn-warning btn-sm me-1 btnEdit"

                                data-id="{{ $warranty->id }}"
                                data-asset="{{ $warranty->asset_id }}"
                                data-no="{{ $warranty->no_garansi }}"
                                data-mulai="{{ $warranty->tanggal_mulai }}"
                                data-akhir="{{ $warranty->tanggal_berakhir }}"
                                data-deskripsi="{{ $warranty->deskripsi }}"

                            >

                                <i class="bi bi-pencil"></i>

                            </button>

                            <form
                                action="{{ route('warranty.destroy',$warranty->id) }}"
                                method="POST"
                                class="d-inline formDelete">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

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
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="{{ route('warranty.store') }}" method="POST">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Warranty
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Asset
                            </label>

                            <select
                                name="asset_id"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Asset --
                                </option>

                                @foreach($assets as $asset)

                                    <option value="{{ $asset->id }}">
                                        {{ $asset->kode_aset }}
                                        -
                                        {{ $asset->nama_aset }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nomor Garansi
                            </label>

                            <input
                                type="text"
                                name="no_garansi"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                name="tanggal_mulai"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal Berakhir
                            </label>

                            <input
                                type="date"
                                name="tanggal_berakhir"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-12">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="deskripsi"
                                rows="4"
                                class="form-control"></textarea>

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

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form method="POST" id="formEdit">

                @csrf
                @method('PUT')

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Warranty
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Asset
                            </label>

                            <select
                                name="asset_id"
                                id="edit_asset"
                                class="form-select"
                                required>

                                @foreach($assets as $asset)

                                    <option value="{{ $asset->id }}">
                                        {{ $asset->kode_aset }} - {{ $asset->nama_aset }}
                                    </option>

                                @endforeach

                                @foreach($warranties as $warranty)

                                    <option value="{{ $warranty->asset->id }}">
                                        {{ $warranty->asset->kode_aset }} - {{ $warranty->asset->nama_aset }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Nomor Garansi
                            </label>

                            <input
                                type="text"
                                id="edit_no"
                                name="no_garansi"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                id="edit_mulai"
                                name="tanggal_mulai"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Tanggal Berakhir
                            </label>

                            <input
                                type="date"
                                id="edit_akhir"
                                name="tanggal_berakhir"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-12">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                id="edit_deskripsi"
                                name="deskripsi"
                                class="form-control"
                                rows="4"></textarea>

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

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
@push('scripts')
<script>

$(document).ready(function () {

$(document).ready(function () {

    // Tambahkan di sini
    setTimeout(function () {
        $('.alert').fadeOut();
    }, 3000);

    $('#warrantyTable').DataTable();

    $('.btnEdit').click(function () {

        let id = $(this).data('id');

        $('#formEdit').attr(
            'action',
            '/warranty/' + id
        );

        $('#edit_asset').val($(this).data('asset'));
        $('#edit_no').val($(this).data('no'));
        $('#edit_mulai').val($(this).data('mulai'));
        $('#edit_akhir').val($(this).data('akhir'));
        $('#edit_deskripsi').val($(this).data('deskripsi'));

        $('#modalEdit').modal('show');

    });

    $('.formDelete').submit(function (e) {

        e.preventDefault();

        let form = this;

        Swal.fire({

            title: 'Hapus Data?',
            text: 'Data warranty akan dihapus permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'

        }).then((result) => {

            if (result.isConfirmed) {

                form.submit();

            }

        });

    });

});

</script>
@endpush
@endsection