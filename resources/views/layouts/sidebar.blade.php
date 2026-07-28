<div class="sidebar">

    <!-- Logo -->
    <div class="logo text-center py-4">
        <i class="bi bi-box-seam display-5"></i>

        <h2 class="fw-bold mt-2 mb-0">
            ASETIN
        </h2>

        <small class="text-white-50">
            Inventory System
        </small>
    </div>

    <!-- Menu -->
    <div class="flex-grow-1 px-3 py-3">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>

        <!-- Master Data -->
        <div class="sidebar-title">
            MASTER DATA
        </div>

        <a href="{{ route('category.index') }}"
           class="sidebar-link {{ request()->routeIs('category.*') ? 'active' : '' }}">
            <i class="bi bi-tags"></i>
            <span>Category</span>
        </a>

        <a href="{{ route('brand.index') }}"
           class="sidebar-link {{ request()->routeIs('brand.*') ? 'active' : '' }}">
            <i class="bi bi-bookmark"></i>
            <span>Brand</span>
        </a>

        <a href="{{ route('supplier.index') }}"
           class="sidebar-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i>
            <span>Supplier</span>
        </a>

        <a href="{{ route('location.index') }}"
           class="sidebar-link {{ request()->routeIs('location.*') ? 'active' : '' }}">
            <i class="bi bi-geo-alt"></i>
            <span>Location</span>
        </a>

        <!-- Transaksi -->
        <div class="sidebar-title mt-4">
            TRANSAKSI
        </div>

        <a href="{{ route('asset.index') }}"
           class="sidebar-link {{ request()->routeIs('asset.*') ? 'active' : '' }}">
            <i class="bi bi-box"></i>
            <span>Asset</span>
        </a>

        <a href="{{ route('warranty.index') }}"
           class="sidebar-link {{ request()->routeIs('warranty.*') ? 'active' : '' }}">
            <i class="bi bi-shield-check"></i>
            <span>Warranty</span>
        </a>

        <a href="#"
           class="sidebar-link">
            <i class="bi bi-tools"></i>
            <span>Maintenance</span>
        </a>

        <a href="#"
           class="sidebar-link">
            <i class="bi bi-file-earmark-text"></i>
            <span>Document</span>
        </a>

        <a href="#"
           class="sidebar-link">
            <i class="bi bi-bar-chart"></i>
            <span>Report</span>
        </a>

    </div>

    <!-- Logout -->
    <div class="p-3 border-top border-light border-opacity-25">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="sidebar-link border-0 bg-transparent text-start w-100">

                <i class="bi bi-box-arrow-right"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>

</div>