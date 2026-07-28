@extends('layouts.app')

@section('title', 'Category')

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
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Daftar Category
        </h3>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalTambahCategory">

            <i class="bi bi-plus-circle"></i>
            Tambah Category

        </button>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <table
                id="categoryTable"
                class="table table-bordered table-hover align-middle">

                <thead class="table-primary">

                    <tr>

                        <th width="70">No</th>
                        <th>Nama Category</th>
                        <th>Deskripsi</th>
                        <th width="170" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $category->nama_kategori }}
                        </td>

                        <td>
                            {{ $category->deskripsi ?? '-' }}
                        </td>

                        <td class="text-center">

                            <button
                                class="btn btn-warning btn-sm me-1"
                                data-bs-toggle="modal"
                                data-bs-target="#editCategory{{ $category->id }}">

                                <i class="bi bi-pencil-square"></i>

                            </button>

                            <form
                                action="{{ route('category.destroy',$category->id) }}"
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

                    <tr>

                        <td colspan="4" class="text-center">

                            Belum ada data category.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahCategory" tabindex="-1">
    <div class="modal-dialog">

        <form action="{{ route('category.store') }}" method="POST">

            @csrf

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Category
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
                            Nama Category
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="nama_kategori"
                            value="{{ old('nama_kategori') }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            class="form-control"
                            name="deskripsi"
                            rows="3">{{ old('deskripsi') }}</textarea>

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
@foreach($categories as $category)

<div
    class="modal fade"
    id="editCategory{{ $category->id }}"
    tabindex="-1">

    <div class="modal-dialog">

        <form
            action="{{ route('category.update', $category->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Edit Category

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

                            Nama Category

                        </label>

                        <input
                            type="text"
                            name="nama_kategori"
                            class="form-control"
                            value="{{ $category->nama_kategori }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="deskripsi"
                            class="form-control"
                            rows="3">{{ $category->deskripsi }}</textarea>

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

    // ==========================
    // DataTables
    // ==========================
    new DataTable('#categoryTable', {

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

    // ==========================
    // SweetAlert Delete
    // ==========================
    document.querySelectorAll('.form-delete').forEach(form => {

        form.addEventListener('submit', function(e){

            e.preventDefault();

            Swal.fire({

                title: 'Hapus Category?',

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

    let modal = new bootstrap.Modal(document.getElementById('modalTambahCategory'));

    modal.show();

});

</script>

@endif

@endpush