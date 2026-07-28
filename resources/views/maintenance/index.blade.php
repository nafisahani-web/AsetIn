@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            <i class="bi bi-tools me-2"></i>
            Data Maintenance
        </h3>

        <button class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah">

            <i class="bi bi-plus-circle"></i>
            Tambah Maintenance

        </button>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-striped"
                   id="maintenanceTable">

                <thead class="table-dark">

                    <tr>

                        <th width="5%">No</th>
                        <th>Asset</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Biaya</th>
                        <th>User</th>
                        <th width="15%">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($maintenances as $maintenance)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $maintenance->asset->nama_aset }}</td>

                        <td>{{ $maintenance->tanggal_maintenance }}</td>

                        <td>{{ $maintenance->jenis_maintenance }}</td>

                        <td>
                            Rp {{ number_format($maintenance->biaya,0,',','.') }}
                        </td>

                        <td>{{ $maintenance->user->name }}</td>

                        <td>

                            <button
                                class="btn btn-warning btn-sm me-1 btnEdit"

                                data-id="{{ $maintenance->id }}"
                                data-asset="{{ $maintenance->asset_id }}"
                                data-tanggal="{{ $maintenance->tanggal_maintenance }}"
                                data-jenis="{{ $maintenance->jenis_maintenance }}"
                                data-biaya="{{ $maintenance->biaya }}"
                                data-deskripsi="{{ $maintenance->deskripsi }}">

                                <i class="bi bi-pencil"></i>

                            </button>

                            <form
                                action="{{ route('maintenance.destroy',$maintenance->id) }}"
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

            <form action="{{ route('maintenance.store') }}" method="POST">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Maintenance
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
                                Tanggal Maintenance
                            </label>

                            <input
                                type="date"
                                name="tanggal_maintenance"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Jenis Maintenance
                            </label>

                            <input
                                type="text"
                                name="jenis_maintenance"
                                class="form-control"
                                placeholder="Contoh: Service, Ganti Sparepart"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Biaya
                            </label>

                            <input
                                type="number"
                                name="biaya"
                                class="form-control"
                                min="0"
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
                        Edit Maintenance
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
                                Asset
                            </label>

                            <select
                                name="asset_id"
                                id="edit_asset"
                                class="form-select"
                                required>

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
                                Tanggal Maintenance
                            </label>

                            <input
                                type="date"
                                id="edit_tanggal"
                                name="tanggal_maintenance"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Jenis Maintenance
                            </label>

                            <input
                                type="text"
                                id="edit_jenis"
                                name="jenis_maintenance"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Biaya
                            </label>

                            <input
                                type="number"
                                id="edit_biaya"
                                name="biaya"
                                class="form-control"
                                min="0"
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

    // Alert otomatis hilang
    setTimeout(function () {

        $('.alert').fadeOut();

    }, 3000);

    // DataTables
    $('#maintenanceTable').DataTable();

    // Tombol Edit
    $('.btnEdit').click(function () {

        let id = $(this).data('id');

        $('#formEdit').attr(
            'action',
            '/maintenance/' + id
        );

        $('#edit_asset').val($(this).data('asset'));
        $('#edit_tanggal').val($(this).data('tanggal'));
        $('#edit_jenis').val($(this).data('jenis'));
        $('#edit_biaya').val($(this).data('biaya'));
        $('#edit_deskripsi').val($(this).data('deskripsi'));

        $('#modalEdit').modal('show');

    });

    // Konfirmasi Hapus
    $('.formDelete').submit(function (e) {

        e.preventDefault();

        let form = this;

        Swal.fire({

            title: 'Hapus Data?',
            text: 'Data maintenance akan dihapus permanen.',
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