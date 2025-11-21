<body>
    @include('layouts.header')
    <div class="container mt-5">
        <h1>Data Diri</h1>
        <p>Berikut adalah data diri saya:</p>
        <ul>
            <li>Nama : Diaz Isya Pratama Yuniarto</li>
            <li>NIM : 2023150145</li>
            <li>Kelas : TI 3</li>
            <li>Alamat : Karang Tengah , Batur, Banjarnegara</li>
        </ul>
        <div style="margin-top:20px;">
        <img src="{{ asset('images/naja.jpg') }}" alt="Foto Saya" width="200" style="border-radius:10px;">
    </div>
        @include('layouts.footer')
    </div>
</body>