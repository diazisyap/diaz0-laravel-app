<body>
    @include('layouts.header')
    <div class="container mt-5 mb-5">
        <h2>Detail Aktivitas</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $aktivitas->nama_aktivitas }}</h5>
                <p class="card-text"><strong>Alamat:</strong> {{ $aktivitas->alamat }}</p>
                <p class="card-text"><strong>Deskripsi:</strong> {{ $aktivitas->deskripsi }}</p>
                <p class="card-text"><strong>Tanggal:</strong> {{ $aktivitas->tanggal }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $aktivitas->status ? 'Selesai' : 'Belum Selesai' }}</p>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>