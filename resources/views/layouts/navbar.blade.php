<nav class="navbar navbar-expand-lg navbar-custom px-4">

    <div class="container-fluid">

        <!-- Judul Halaman -->
        <div>

            <h3 class="fw-bold mb-0 text-dark">
                @yield('title')
            </h3>

            <small class="text-muted">
                Selamat datang di Sistem Manajemen Inventaris ASETIN
            </small>

        </div>

        <!-- User -->
        <div class="d-flex align-items-center ms-auto">

            <div class="dropdown">

                <button
                    class="btn bg-white border shadow-sm rounded-pill px-3 py-2 d-flex align-items-center"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                        style="width:42px;height:42px;">

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <div class="text-start me-2">

                        <div class="fw-semibold text-dark" style="font-size:14px;">
                            {{ Auth::user()->name }}
                        </div>

                        <small class="text-muted">
                            {{ ucfirst(Auth::user()->peran) }}
                        </small>

                    </div>

                    <i class="bi bi-chevron-down text-secondary"></i>

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 mt-2">

                    <li class="px-3 py-2">

                        <div class="fw-bold">
                            {{ Auth::user()->name }}
                        </div>

                        <small class="text-muted">

                            {{ ucfirst(Auth::user()->peran) }}

                        </small>

                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button class="dropdown-item py-2">

                                <i class="bi bi-box-arrow-right me-2 text-danger"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>