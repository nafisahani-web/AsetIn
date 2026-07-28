<nav class="navbar navbar-expand-lg navbar-light navbar-custom px-4">

    <div class="container-fluid">

        <h4 class="mb-0 fw-bold">
            @yield('title')
        </h4>

        <div class="ms-auto d-flex align-items-center">

            <i class="bi bi-person-circle fs-4 me-2"></i>

            <div class="dropdown">

                <button
                    class="btn btn-light dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">

                    {{ Auth::user()->name }}

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <span class="dropdown-item-text">
                            <strong>Role :</strong>
                            {{ ucfirst(Auth::user()->peran) }}
                        </span>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="dropdown-item">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>