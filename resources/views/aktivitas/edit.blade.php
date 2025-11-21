<body>
    @include('layouts.header')

    <div class="container mt-3 mb-3">
        <h2>Edit Aktivitas</h2>

        <form action="{{ route('aktivitas.update', $aktivitas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Aktivitas</label>
                <input type="text" name="nama_aktivitas" class="form-control" value="{{ $aktivitas->nama_aktivitas }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $aktivitas->alamat }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $aktivitas->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $aktivitas->tanggal }}">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="0" {{ $aktivitas->status == 0 ? 'selected' : '' }}>Belum Selesai</option>
                    <option value="1" {{ $aktivitas->status == 1 ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-success btn-sm">Perbarui</button>
            </div>
        </form>
    </div>

    @include('layouts.footer')
</body>