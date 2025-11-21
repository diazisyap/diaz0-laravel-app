<body>
    @include('layouts.header')
    <div class="container mt-5 mb-5">
        <h2>Daftar Aktivitas</h2>
        <a href="{{ route('aktivitas.create') }}" class="btn btn-primary mb-3">Tambah Aktivitas</a>

        <table class="table table-bordered mt-3" border="1">
            <thead>
                <tr>
                    <th>Nama Aktivitas</th>
                     <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_aktivitas }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ date('d-m-y', strtotime($item->tanggal)) }}</td>
                    <td>{{ $item->status ? 'Selesai' : 'Belum Selesai' }}</td>
                    <td>
                        <a href="{{ route('aktivitas.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('aktivitas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('aktivitas.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 

        @include('layouts.footer')
    </div>
</body>