<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    <div class="sidebar-brand" style="height: 105px; overflow: visible;">

        <a href="{{ route('dashboard') }}"
           class="brand-link"
           style="
               display: flex;
               align-items: center;
               padding-left: 5px;
           ">

            <img
                src="{{ asset('adminlte/dist/assets/img/AdminLTELogo.png') }}"
                alt="HMS Logo"
                style="
                    width: 100px;
                    height: 100px;
                    object-fit: contain;
                    margin-left: -85px;
                    margin-right: 8px;
                    margin-top: 10px;
                "
            >

            <span
                style="
                    color: #ffffff !important;
                    font-size: 28px;
                    font-weight: 300;
                    margin-left: 20px;
                    margin-top: 15px;
                "
            >
                HMS
            </span>

        </a>

    </div>


    {{-- Sidebar Wrapper --}}
    <div class="sidebar-wrapper">

        <nav class="mt-2">

            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
            >

                {{-- Dashboard --}}
                <li class="nav-item">

                    <a href="{{ route('dashboard') }}" class="nav-link">

                        <i class="nav-icon bi bi-speedometer"></i>

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>


                {{-- Patients --}}
                <li class="nav-item">

                    <a href="{{ route('patients') }}" class="nav-link">

                        <i class="nav-icon bi bi-person"></i>

                        <p>
                            Patients
                        </p>

                    </a>

                </li>


                {{-- Doctors --}}
@role('Admin')
<li class="nav-item">

    <a href="{{ route('doctors.index') }}" class="nav-link">

        <i class="nav-icon bi bi-person-badge"></i>

        <p>
            Doctors
        </p>

    </a>

</li>
@endrole


                {{-- Appointments --}}
                <li class="nav-item">

                    <a href="{{ route('appointments.index') }}" class="nav-link">

                        <i class="nav-icon bi bi-calendar-check"></i>

                        <p>
                            Appointments
                        </p>

                    </a>

                </li>



                   {{-- Medical Care --}}
<li class="nav-item">

    <a href="{{ route('medical-care') }}" class="nav-link">

        <i class="nav-icon bi bi-heart-pulse"></i>

        <p>
            Medical Care
        </p>

    </a>

</li>
                    </ul>

                </li>


            </ul>

        </nav>

    </div>

</aside>