@extends('layouts.app')

@section('title', 'Document')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Document Management</h4>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#createModal">
            <i class="bi bi-plus-circle"></i>
            Add Document
        </button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="documentTable">

                    <thead class="table-dark">

                    <tr>
                        <th width="60">No</th>
                        <th>Asset</th>
                        <th>Document Name</th>
                        <th>Document Type</th>
                        <th>Upload Date</th>
                        <th width="120">File</th>
                        <th width="160">Action</th>
                    </tr>

                    </thead>

                    <tbody>

                    @foreach($documents as $document)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $document->asset->nama_aset }}</td>

                            <td>{{ $document->nama_dokumen }}</td>

                            <td>{{ $document->jenis_dokumen }}</td>

                            <td>{{ $document->tanggal_unggah }}</td>

                            <td>

                                <a
                                    href="{{ route('document.show',$document->id) }}"
                                    class="btn btn-success btn-sm">

                                    <i class="bi bi-download"></i>

                                </a>

                            </td>

                            <td>

                                <button
                                    class="btn btn-warning btn-sm editBtn"

                                    data-id="{{ $document->id }}"
                                    data-asset="{{ $document->asset_id }}"
                                    data-nama="{{ $document->nama_dokumen }}"
                                    data-jenis="{{ $document->jenis_dokumen }}"
                                    data-tanggal="{{ $document->tanggal_unggah }}">

                                    <i class="bi bi-pencil-square"></i>

                                </button>

                                <form
                                    action="{{ route('document.destroy',$document->id) }}"
                                    method="POST"
                                    class="d-inline deleteForm">

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

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

@endsection
<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form
                action="{{ route('document.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Document
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
                                    -- Select Asset --
                                </option>

                                @foreach($assets as $asset)

                                    <option value="{{ $asset->id }}">
                                        {{ $asset->nama_aset }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Document Name
                            </label>

                            <input
                                type="text"
                                name="nama_dokumen"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Document Type
                            </label>

                            <input
                                type="text"
                                name="jenis_dokumen"
                                class="form-control"
                                placeholder="Example: Invoice, Manual Book, Photo"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Upload Date
                            </label>

                            <input
                                type="date"
                                name="tanggal_unggah"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-12 mb-3">

                            <label class="form-label">
                                Upload File
                            </label>

                            <input
                                type="file"
                                name="file"
                                class="form-control"
                                required>

                            <small class="text-muted">
                                Supported formats:
                                PDF, DOC, DOCX, XLS, XLSX,
                                PPT, PPTX, JPG, JPEG, PNG
                                (Max 10 MB)
                            </small>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Save

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form
                id="editForm"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Document
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
                                        {{ $asset->nama_aset }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Document Name
                            </label>

                            <input
                                type="text"
                                name="nama_dokumen"
                                id="edit_nama"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Document Type
                            </label>

                            <input
                                type="text"
                                name="jenis_dokumen"
                                id="edit_jenis"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Upload Date
                            </label>

                            <input
                                type="date"
                                name="tanggal_unggah"
                                id="edit_tanggal"
                                class="form-control"
                                required>

                        </div>

                        <div class="col-12 mb-3">

                            <label class="form-label">
                                Replace File (Optional)
                            </label>

                            <input
                                type="file"
                                name="file"
                                class="form-control">

                            <small class="text-muted">
                                Leave empty if you don't want to replace the current file.
                            </small>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        class="btn btn-warning">

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
    console.log('JS Loaded');

    $('#documentTable').DataTable();

    $('.editBtn').click(function () {

        let id = $(this).data('id');

        $('#edit_asset').val($(this).data('asset'));
        $('#edit_nama').val($(this).data('nama'));
        $('#edit_jenis').val($(this).data('jenis'));
        $('#edit_tanggal').val($(this).data('tanggal'));

        $('#editForm').attr('action', '/document/' + id);

        $('#editModal').modal('show');

    });

 $(document).on('submit', '.deleteForm', function (e) {

    console.log('Delete clicked');

    e.preventDefault();

    let form = this;

    Swal.fire({
        title: 'Delete Document?',
        text: 'Deleted data cannot be restored.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {

        if (result.isConfirmed) {
            form.submit();
        }

    });

});

});

</script>

@if(session('success'))

<script>

Swal.fire({

    icon: 'success',

    title: 'Success',

    text: '{{ session('success') }}',

    timer: 2000,

    showConfirmButton: false

});

</script>

@endif

@endpush