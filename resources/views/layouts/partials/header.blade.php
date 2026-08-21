<nav class="app-header navbar navbar-expand bg-body">

    <div class="container-fluid">

        {{-- =========================
             LEFT SIDE
        ========================== --}}
        <ul class="navbar-nav align-items-center">

            {{-- Sidebar Toggle --}}
            <li class="nav-item">
                <a
                    class="nav-link"
                    data-lte-toggle="sidebar"
                    href="#"
                    role="button"
                    aria-label="Toggle sidebar"
                >
                    <i class="bi bi-list fs-5"></i>
                </a>
            </li>

            {{-- Hospital Name --}}
            <li class="nav-item d-none d-md-block">
                <span
                    class="nav-link ps-2"
                    style="
                        font-size: 17px;
                        font-weight: 600;
                        color: #1f2937;
                    "
                >
                    Hospital Management System
                </span>
            </li>

        </ul>


        {{-- =========================
             RIGHT SIDE
        ========================== --}}
        <ul class="navbar-nav ms-auto align-items-center">

            {{-- Search --}}
            <li class="nav-item d-none d-md-block me-3">

                <form class="d-flex align-items-center">

                    <div
                        class="input-group"
                        style="width: 230px;"
                    >

                        <input
                            type="search"
                            class="form-control form-control-sm"
                            placeholder="Search..."
                            aria-label="Search"
                            style="
                                border-radius: 6px 0 0 6px;
                                border-color: #d9dee5;
                            "
                        >

                        <button
                            type="submit"
                            class="btn btn-sm btn-outline-secondary"
                            aria-label="Search"
                            style="
                                border-radius: 0 6px 6px 0;
                            "
                        >
                            <i class="bi bi-search"></i>
                        </button>

                    </div>

                </form>

            </li>


            {{-- Notifications --}}
            <li class="nav-item dropdown me-2">

                <a
                    class="nav-link position-relative"
                    href="#"
                    data-bs-toggle="dropdown"
                    aria-label="Notifications"
                >

                    <i class="bi bi-bell fs-5"></i>

                    <span
                        class="navbar-badge badge text-bg-warning"
                        style="font-size: 9px;"
                    >
                        3
                    </span>

                </a>


                {{-- Notification Dropdown --}}
                <div
                    class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow-sm"
                >

                    <span class="dropdown-item dropdown-header">
                        3 Notifications
                    </span>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item py-2">

                        <i class="bi bi-person-plus me-2 text-primary"></i>

                        New patient registered

                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item py-2">

                        <i class="bi bi-calendar-check me-2 text-success"></i>

                        New appointment

                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item py-2">

                        <i class="bi bi-person-badge me-2 text-info"></i>

                        Doctor added

                    </a>

                </div>

            </li>


            {{-- =========================
                 ADMIN USER MENU
            ========================== --}}
            <li class="nav-item dropdown user-menu">

                <a
                    href="#"
                    class="nav-link dropdown-toggle d-flex align-items-center"
                    data-bs-toggle="dropdown"
                >

                    <i class="bi bi-person-circle fs-5"></i>

                    <span class="d-none d-md-inline ms-2">
                        Admin
                    </span>

                </a>


                {{-- User Dropdown --}}
                <ul
                    class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow-sm"
                >

                    {{-- User Header --}}
                    <li class="user-header text-bg-primary text-center">

                        <i class="bi bi-person-circle fs-1"></i>

                        <p class="mb-0 mt-2">
                            Admin
                        </p>

                        <small>
                            Hospital Management System
                        </small>

                    </li>


                    {{-- User Footer --}}
                    <li
                        class="user-footer d-flex justify-content-between"
                    >

                        {{-- Profile --}}
                        <a
                            href="#"
                            class="btn btn-sm btn-outline-secondary"
                        >
                            <i class="bi bi-person me-1"></i>
                            Profile
                        </a>


                        {{-- Logout --}}
                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-sm btn-outline-danger"
                            >
                                <i class="bi bi-box-arrow-right me-1"></i>
                                Logout
                            </button>

                        </form>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>