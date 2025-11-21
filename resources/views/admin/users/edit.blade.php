<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin-bottom: 25px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container-form">
        <h1>Edit User</h1>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (Opsional)</label>
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Kosongkan jika tidak ingin mengganti password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" 
                       name="password_confirmation" placeholder="Kosongkan jika tidak mengganti password">
            </div>

            <div class="mb-3">
                <label for="is_admin" class="form-label">Status Admin</label>
                <select class="form-select" id="is_admin" name="is_admin" required>
                    <option value="0" {{ $user->is_admin ? '' : 'selected' }}>User Biasa</option>
                    <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>