@extends('layouts.app')

@section('title', 'Supplier')

@section('content')

<div class="container-fluid">

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Terjadi kesalahan!</strong>

        <ul class="mb-0 mt-2">
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
            Daftar Supplier
        </h3>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalTambahSupplier">

            <i class="bi bi-plus-circle"></i>
            Tambah Supplier

        </button>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <table
                id="supplierTable"
                class="table table-bordered table-hover align-middle">

                <thead class="table-primary">

                    <tr>

                        <th width="70">No</th>

                        <th>Nama Supplier</th>

                        <th>No HP</th>

                        <th>Email</th>

                        <th>Alamat</th>

                        <th width="170" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($suppliers as $supplier)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $supplier->nama_supplier }}</td>

                        <td>{{ $supplier->no_hp }}</td>

                        <td>{{ $supplier->email }}</td>

                        <td>{{ $supplier->alamat }}</td>

                        <td class="text-center">

                            <button
                                class="btn btn-warning btn-sm me-1"
                                data-bs-toggle="modal"
                                data-bs-target="#editSupplier{{ $supplier->id }}">

                                <i class="bi bi-pencil-square"></i>

                            </button>

                            <form
                                action="{{ route('supplier.destroy', $supplier->id) }}"
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

<!-- Modal Tambah Supplier -->
<div class="modal fade" id="modalTambahSupplier" tabindex="-1">
    <div class="modal-dialog">

        <form action="{{ route('supplier.store') }}" method="POST">

            @csrf

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Supplier
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Supplier
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="nama_supplier"
                            value="{{ old('nama_supplier') }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            No HP
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            value="{{ old('email') }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea
                            class="form-control"
                            name="alamat"
                            rows="3"
                            required>{{ old('alamat') }}</textarea>

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

            </div>

        </form>

    </div>
</div>

{{-- Modal Edit --}}
@foreach($suppliers as $supplier)

<div
    class="modal fade"
    id="editSupplier{{ $supplier->id }}"
    tabindex="-1">

    <div class="modal-dialog">

        <form
            action="{{ route('supplier.update', $supplier->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Edit Supplier

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Supplier
                        </label>

                        <input
                            type="text"
                            name="nama_supplier"
                            class="form-control"
                            value="{{ $supplier->nama_supplier }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            No HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control"
                            value="{{ $supplier->no_hp }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ $supplier->email }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            required>{{ $supplier->alamat }}</textarea>

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

    new DataTable('#supplierTable', {

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

                title: 'Hapus Supplier?',

                text: 'Data yang dihapus tidak dapat dikembalikan.',

                icon: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#d33',

                cancelButtonColor: '#6c757d',

                confirmButtonText: 'Ya, Hapus',

                cancelButtonText: 'Batal'

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

document.addEventListener("DOMContentLoaded", function () {

    Swal.fire({

        icon: 'success',

        title: 'Berhasil',

        text: '{{ session("success") }}',

        confirmButtonColor: '#0d6efd',

        confirmButtonText: 'OK'

    });

});

</script>

@endif

@if($errors->any())

<script>

document.addEventListener("DOMContentLoaded", function () {

    let modal = new bootstrap.Modal(document.getElementById('modalTambahSupplier'));

    modal.show();

});

</script>

@endif

@endpush