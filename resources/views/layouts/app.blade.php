<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel - Ajax</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/DataTables-1.13.3/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background: #91C8E4;
            min-height: 100vh;
            width: 250px;
            transition: all 0.3s ease;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo-container {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo-container img {
            max-width: 180px;
            height: auto;
            transition: all 0.3s ease;
        }

        .sidebar .nav-item {
            margin: 0.5rem 0;
            padding: 0 1rem;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background-color: #2ecc71;
            color: #fff;
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar form button.nav-link:hover, .sidebar form button.nav-link:focus {
            background-color: #e74c3c !important;
            color: #fff !important;
        }

        .main-content {
            flex: 1;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #fff !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1rem 1.5rem;
        }

        .navbar-brand {
            font-weight: 600;
            color: #1a5f7a !important;
            font-size: 1.25rem;
        }

        .content-wrapper {
            padding: 2rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar .logo-container img {
                max-width: 40px;
            }

            .sidebar .nav-link span {
                display: none;
            }

            .sidebar .nav-link {
                justify-content: center;
                padding: 0.8rem;
            }

            .sidebar .nav-link i {
                margin: 0;
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="logo-container">
                <img src="{{ secure_asset('assets/image/logo.png') }}" alt="logo" class="img-fluid">
            </div>
            <ul class="nav flex-column mt-4" style="height: calc(100vh - 120px); display: flex; flex-direction: column;">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mahasiswa') }}" class="nav-link {{ request()->is('mahasiswa') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate"></i>
                        <span>Data Mahasiswa</span>
                    </a>
                </li>
                <li class="nav-item mt-auto" style="margin-top:auto;">
                    <form action="{{ route('logout') }}" method="post" style="display: inline;">
                        @csrf
                        <button class="nav-link text-white border-0 bg-transparent d-flex align-items-center" type="submit" style="width: 100%; text-align: left; gap:0.75rem;" onclick="return confirm('Antum Mau Logout?')">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>LogOut</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a href="/" class="navbar-brand">
                        <i class="fas fa-university me-2"></i>
                        <span>Sistem Akademik</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link position-relative" href="#">
                                    <i class="fas fa-bell me-2"></i>
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">3</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center ms-auto" style="gap:0.5rem;">
                        <i class="fas fa-user-circle fa-lg"></i>
                        <span class="fw-semibold" style="font-size:1.08rem;">{{ Auth::user() ? Auth::user()->name : 'User' }}</span>
                    </div>
                </div>
            </nav>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ secure_asset('assets/jquery-3.6.1.js') }}"></script>
    <script src="{{ secure_asset('assets/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('assets/datatables.min.js') }}"></script>
    <script src="{{ secure_asset('assets/toastr.min.js') }}"></script>
    <script src="{{ secure_asset('assets/DataTables-1.13.3/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ secure_asset('assets/DataTables-1.13.3/js/jquery.dataTables.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
