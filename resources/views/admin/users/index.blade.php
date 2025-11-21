<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Manajemen User</title>
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
            transition: all 0.3s;
            z-index: 1000;
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

        .container-content {
            margin-left: 250px;
            padding: 80px 30px 30px;
        }

        @media (max-width: 768px) {
            #sidebar-wrapper {
                width: 100%;
                height: auto;
                position: relative;
                top: 0;
                border-right: none;
            }

            .container-content {
                margin-left: 0;
                padding: 70px 15px;
            }
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

    <div class="container-content">
        <h1 class="mb-4">Manajemen User</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Tambah User Baru</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
