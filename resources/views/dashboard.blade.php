@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Asset</h6>
                    <h2 class="fw-bold">0</h2>
                    <i class="bi bi-box fs-1 text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Category</h6>
                    <h2 class="fw-bold">0</h2>
                    <i class="bi bi-tags fs-1 text-success"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Supplier</h6>
                    <h2 class="fw-bold">0</h2>
                    <i class="bi bi-truck fs-1 text-warning"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Location</h6>
                    <h2 class="fw-bold">0</h2>
                    <i class="bi bi-geo-alt fs-1 text-danger"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="card mt-4 shadow-sm border-0">
        <div class="card-header fw-bold">
            Selamat Datang
        </div>

        <div class="card-body">
            <h4>Halo, {{ Auth::user()->name }} 👋</h4>

            <p class="text-muted mb-0">
                Selamat datang di Sistem Manajemen Inventaris Aset (AsetIn).
            </p>
        </div>
    </div>

</div>

@endsection