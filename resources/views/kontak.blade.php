<body>
    @include('layouts.header')
    <div class="container mt-5">
        <h2>Form Kontak</h2>

        <form action="{{ route('kontak.kirim') }}" method="POST">
            @csrf
            
            <table class="table-borderless w-100" style="max-width: 600px;">
                        <tr class="mb-3">
                            <td style="width: 120px;">
                                <label for="nama" class="form-label fw-bold">Nama:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </td>
                        </tr>

                        <tr class="mb-3">
                            <td>
                                <label for="email" class="form-label fw-bold">Email:</label>
                            </td>
                            <td>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </td>
                        </tr>

                        <tr class="mb-3">
                            <td>
                                <label for="no_hp" class="form-label fw-bold">No. HP:</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </td>
                        </tr>

                        <tr class="mb-3 align-top">
                            <td>
                                <label for="pesan" class="form-label fw-bold">Pesan:</label>
                            </td>
                            <td>
                                <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="text-end">
                                <button type="submit" class="btn btn-primary px-4">Kirim</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

        @include('layouts.footer')
    </div>
</body>