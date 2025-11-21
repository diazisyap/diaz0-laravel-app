<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            height: 56px;
        }

        #sidebar-wrapper {
            width: 250px;
            position: fixed;
            top: 56px;
            left: 0;
            height: 100%;
            background-color: #fff;
            border-right: 1px solid #dee2e6;
            padding-top: 15px;
        }

        #sidebar-wrapper .sidebar-heading {
            font-weight: 600;
            padding: 0 20px 10px;
            border-bottom: 1px solid #dee2e6;
            color: #212529;
        }

        #sidebar-wrapper .list-group a {
            border: none;
            color: #212529;
        }

        #sidebar-wrapper .list-group a:hover,
        #sidebar-wrapper .list-group a.active {
            background-color: #e9ecef;
            color: #000;
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 80px 30px 30px;
        }

        .content-wrapper h1 {
            font-weight: 700;
            font-size: 2rem;
        }

        .content-wrapper p {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand">Admin Panel</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebar-wrapper">
        <div class="sidebar-heading">Menu Admin</div>
        <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" 
               class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
               Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}" 
               class="list-group-item list-group-item-action {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
               Manajemen User
            </a>
            <a href="#" class="list-group-item list-group-item-action">Aktivitas</a>
        </div>
    </div>

    <div class="content-wrapper">
        <h1>Selamat Datang di Dashboard Admin!</h1>
        <p>Ini adalah halaman utama untuk admin.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>