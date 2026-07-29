@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- ===================== STATISTIK DASHBOARD ===================== -->

<div class="row g-4 mb-4">

    <!-- Total Asset -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total Asset</small>
                    <h2 class="fw-bold text-primary mb-0">{{ $totalAsset }}</h2>
                </div>

                <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-box fs-2 text-primary"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Asset Aktif -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Asset Aktif</small>
                    <h2 class="fw-bold text-success mb-0">{{ $assetAktif }}</h2>
                </div>

                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-check-circle fs-2 text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Maintenance -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Maintenance</small>
                    <h2 class="fw-bold text-warning mb-0">{{ $assetMaintenance }}</h2>
                </div>

                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-tools fs-2 text-warning"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Rusak -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Rusak</small>
                    <h2 class="fw-bold text-danger mb-0">{{ $assetRusak }}</h2>
                </div>

                <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-x-octagon fs-2 text-danger"></i>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row g-4 mb-4">

    <!-- Dipinjam -->
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Dipinjam</small>
                    <h2 class="fw-bold text-info mb-0">{{ $assetDipinjam }}</h2>
                </div>

                <div class="bg-info bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-arrow-left-right fs-2 text-info"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Category -->
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Category</small>
                    <h2 class="fw-bold text-success mb-0">{{ $totalCategory }}</h2>
                </div>

                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-tags fs-2 text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Supplier -->
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Supplier</small>
                    <h2 class="fw-bold text-warning mb-0">{{ $totalSupplier }}</h2>
                </div>

                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-truck fs-2 text-warning"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="col-xl-3 col-lg-12 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Location</small>
                    <h2 class="fw-bold text-danger mb-0">{{ $totalLocation }}</h2>
                </div>

                <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                    <i class="bi bi-geo-alt fs-2 text-danger"></i>
                </div>
            </div>
        </div>
    </div>

</div>

            <div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 fw-bold fs-4">
        Selamat Datang 👋
    </div>

    <div class="card-body">

        <h4 class="fw-bold">
            Halo, {{ Auth::user()->name }}
        </h4>

        <p class="text-muted mb-0">
            Selamat datang di
            <strong>Sistem Manajemen Inventaris Aset (ASETIN)</strong>.
            Gunakan dashboard ini untuk memantau seluruh data inventaris secara cepat dan efisien.
        </p>

</div>

@endsection