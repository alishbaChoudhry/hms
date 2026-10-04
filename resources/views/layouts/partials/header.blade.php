<nav class="app-header navbar navbar-expand bg-white border-bottom">

<div class="container-fluid px-3">

    {{-- =========================
         LEFT SIDE
    ========================== --}}
    <ul class="navbar-nav align-items-center">

        {{-- Sidebar Toggle --}}
        <li class="nav-item">
            <a
                class="nav-link header-icon-btn"
                data-lte-toggle="sidebar"
                href="#"
                role="button"
                aria-label="Toggle sidebar"
            >
                <i class="bi bi-list"></i>
            </a>
        </li>

        {{-- Hospital Name --}}
        <li class="nav-item d-none d-md-block">
            <span class="hospital-title">
                Hospital Management System
            </span>
        </li>

    </ul>


    {{-- =========================
         RIGHT SIDE
    ========================== --}}
    <ul class="navbar-nav ms-auto align-items-center gap-1">

        {{-- Search --}}
        <li class="nav-item d-none d-md-block me-2">

            <form class="header-search">

                <div class="input-group">

                    <input
                        type="search"
                        class="form-control"
                        placeholder="Search..."
                        aria-label="Search"
                    >

                    <button
                        type="submit"
                        class="btn"
                        aria-label="Search"
                    >
                        <i class="bi bi-search"></i>
                    </button>

                </div>

            </form>

        </li>


        {{-- Notifications --}}
        <li class="nav-item dropdown">

            <a
                class="nav-link header-icon-btn position-relative"
                href="#"
                data-bs-toggle="dropdown"
                aria-label="Notifications"
            >

                <i class="bi bi-bell"></i>

                @if(auth()->user()->unreadNotifications->count() > 0)
                    <span class="notification-badge">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </span>
                @endif

            </a>


            {{-- Notification Dropdown --}}
            <div
                class="dropdown-menu dropdown-menu-lg dropdown-menu-end notification-dropdown shadow-sm"
            >

                {{-- Header --}}
                <div class="notification-header">
                    <div>
                        <strong>Notifications</strong>
                        <small>
                            {{ auth()->user()->unreadNotifications->count() }} unread
                        </small>
                    </div>

                    <i class="bi bi-bell"></i>
                </div>

                <div class="dropdown-divider"></div>


                {{-- Notifications --}}
                @forelse(auth()->user()->unreadNotifications->take(5) as $notification)

                    <a
                        href="{{ route('notifications.read', $notification->id) }}"
                        class="notification-item"
                    >

                        <div class="notification-icon">

                            @if(($notification->data['type'] ?? '') === 'patient')

                                <i class="bi bi-person-plus text-primary"></i>

                            @elseif(($notification->data['type'] ?? '') === 'appointment')

                                <i class="bi bi-calendar-check text-success"></i>

                            @elseif(($notification->data['type'] ?? '') === 'doctor')

                                <i class="bi bi-person-badge text-info"></i>

                            @else

                                <i class="bi bi-bell text-warning"></i>

                            @endif

                        </div>

                        <div class="notification-content">
                            <span>
                                {{ \Illuminate\Support\Str::limit($notification->data['message'] ?? 'New notification', 45) }}
                            </span>

                            <small>
                                New notification
                            </small>
                        </div>

                    </a>

                @empty

                    <div class="notification-empty">
                        <i class="bi bi-bell-slash"></i>
                        <span>No new notifications</span>
                    </div>

                @endforelse


                {{-- View All --}}
                @if(auth()->user()->unreadNotifications->count() > 0)

                    <div class="dropdown-divider mb-0"></div>

                    <a
                        href="#"
                        class="notification-footer"
                    >
                        View all notifications
                        <i class="bi bi-arrow-right"></i>
                    </a>

                @endif

            </div>

        </li>


        {{-- User Menu --}}
        <li class="nav-item dropdown user-menu ms-1">

            <a
                href="#"
                class="nav-link user-profile dropdown-toggle"
                data-bs-toggle="dropdown"
            >

                <div class="user-avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div class="user-info d-none d-md-block">
                    <span class="user-name">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>

                    <small>
                      {{ auth()->user()->hasRole('Admin') ? 'Administrator' : 'Doctor' }}
                    </small>
                </div>

            </a>


            {{-- User Dropdown --}}
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end user-dropdown shadow-sm">

                {{-- User Header --}}
                <li class="user-header">

                    <div class="large-user-avatar">
                        <i class="bi bi-person"></i>
                    </div>

                    <strong>
                        {{ auth()->user()->name ?? 'Admin' }}
                    </strong>

                    <small>
                    {{ auth()->user()->hasRole('Admin') ? 'Administrator' : 'Doctor' }}
                     </small>

                </li>


                {{-- User Footer --}}
                <li class="user-footer">

                    <a
                        href="#"
                        class="btn btn-sm btn-outline-secondary"
                    >
                        <i class="bi bi-person me-1"></i>
                        Profile
                    </a>

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

<style>

    /* =========================
       HEADER
    ========================== */

    .app-header {
        min-height: 64px;
        background: #ffffff !important;
        border-bottom: 1px solid #e5e7eb;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
    }


    /* =========================
       HEADER ICONS
    ========================== */

    .header-icon-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        color: #4b5563;
        font-size: 20px;
        transition: all 0.2s ease;
    }

    .header-icon-btn:hover {
        background: #f3f4f6;
        color: #2563eb;
    }


    /* =========================
       HOSPITAL TITLE
    ========================== */

    .hospital-title {
        display: inline-flex;
        align-items: center;
        height: 32px;
        margin-left: 8px;
        padding-left: 18px;

        border-left: 1px solid #e5e7eb;

        color: #1f2937;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: 0.1px;
    }


    /* =========================
       SEARCH
    ========================== */

    .header-search {
        width: 230px;
    }

    .header-search .input-group {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.2s ease;
    }

    .header-search .input-group:focus-within {
        border-color: #bfdbfe;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
    }

    .header-search .form-control {
        height: 38px;
        border: 0;
        background: transparent;
        box-shadow: none;
        font-size: 13px;
        color: #374151;
    }

    .header-search .form-control::placeholder {
        color: #9ca3af;
    }

    .header-search .form-control:focus {
        box-shadow: none;
    }

    .header-search .btn {
        height: 38px;
        border: 0;
        background: transparent;
        color: #6b7280;
        padding: 0 12px;
    }

    .header-search .btn:hover {
        color: #2563eb;
    }


    /* =========================
       NOTIFICATION BADGE
    ========================== */

    .notification-badge {
        position: absolute;
        top: 3px;
        right: 1px;

        min-width: 17px;
        height: 17px;
        padding: 0 4px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50px;

        background: #dc3545;
        color: #ffffff;

        border: 2px solid #ffffff;

        font-size: 9px;
        font-weight: 600;
        line-height: 1;
    }


    /* =========================
       NOTIFICATION DROPDOWN
    ========================== */

    .notification-dropdown {
        width: 350px;
        max-height: 400px;

        padding: 0;

        border: 1px solid #e5e7eb;
        border-radius: 10px;

        overflow-y: auto;
        overflow-x: hidden;

        background: #ffffff;
    }


    /* Notification Header */

    .notification-header {
        padding: 14px 16px;

        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .notification-header strong {
        display: block;

        color: #1f2937;
        font-size: 14px;
        font-weight: 600;
    }

    .notification-header small {
        display: block;
        margin-top: 2px;

        color: #9ca3af;
        font-size: 11px;
    }

    .notification-header > i {
        color: #6b7280;
        font-size: 18px;
    }


    /* Notification Item */

    .notification-item {
        display: flex;
        align-items: center;

        gap: 12px;

        padding: 12px 16px;

        text-decoration: none;

        color: #374151;

        transition: background 0.2s ease;
    }

    .notification-item:hover {
        background: #f8fafc;
    }


    /* Notification Icon */

    .notification-icon {
        width: 34px;
        height: 34px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f3f4f6;

        border-radius: 8px;

        font-size: 16px;
    }


    /* Notification Content */

    .notification-content {
        min-width: 0;
    }

    .notification-content span {
        display: block;

        color: #374151;

        font-size: 12px;
        line-height: 1.4;
    }

    .notification-content small {
        display: block;

        margin-top: 3px;

        color: #9ca3af;

        font-size: 10px;
    }


    /* Empty Notifications */

    .notification-empty {
        padding: 28px 15px;

        text-align: center;

        color: #9ca3af;
    }

    .notification-empty i {
        display: block;

        margin-bottom: 8px;

        font-size: 24px;
    }

    .notification-empty span {
        font-size: 12px;
    }


    /* Notification Footer */

    .notification-footer {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        padding: 11px;

        color: #2563eb;

        text-decoration: none;

        font-size: 12px;
        font-weight: 500;
    }

    .notification-footer:hover {
        background: #f8fafc;
        color: #1d4ed8;
    }


    /* =========================
       USER PROFILE
    ========================== */

    .user-profile {
        display: flex;
        align-items: center;

        gap: 8px;

        padding: 4px 8px !important;

        border-radius: 8px;

        transition: background 0.2s ease;
    }

    .user-profile:hover {
        background: #f3f4f6;
    }


    /* User Avatar */

    .user-avatar {
        width: 36px;
        height: 36px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #eef2ff;
        color: #2563eb;

        font-size: 17px;
    }


    /* User Info */

    .user-info {
        line-height: 1.2;
    }

    .user-name {
        display: block;

        color: #1f2937;

        font-size: 13px;
        font-weight: 600;
    }

    .user-info small {
        display: block;

        margin-top: 2px;

        color: #9ca3af;

        font-size: 10px;
    }


    /* =========================
       USER DROPDOWN
    ========================== */

    .user-dropdown {
        width: 260px;

        padding: 0;

        border: 1px solid #e5e7eb;
        border-radius: 10px;

        overflow: hidden;

        background: #ffffff;
    }


    /* User Header */

    .user-header {
        padding: 22px 15px;

        display: flex;
        flex-direction: column;
        align-items: center;

        text-align: center;

        background: #f8fafc;
    }


    /* Large Avatar */

    .large-user-avatar {
        width: 58px;
        height: 58px;

        margin-bottom: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #eef2ff;
        color: #2563eb;

        font-size: 28px;
    }

    .user-header strong {
        color: #1f2937;

        font-size: 14px;
        font-weight: 600;
    }

    .user-header small {
        margin-top: 3px;

        color: #9ca3af;

        font-size: 11px;
    }


    /* User Footer */

    .user-footer {
        padding: 12px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 10px;

        background: #ffffff;
    }

    .user-footer .btn {
        font-size: 12px;
    }


    /* =========================
       DROPDOWN ANIMATION
    ========================== */

    .notification-dropdown,
    .user-dropdown {
        animation: headerDropdown 0.15s ease-out;
    }

    @keyframes headerDropdown {

        from {
            opacity: 0;
            transform: translateY(-5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    /* =========================
       MOBILE
    ========================== */

    @media (max-width: 767.98px) {

        .app-header {
            min-height: 58px;
        }

        .notification-dropdown {
            width: 310px;
            max-width: calc(100vw - 20px);
        }

        .user-dropdown {
            width: 250px;
            max-width: calc(100vw - 20px);
        }

    }

</style>
