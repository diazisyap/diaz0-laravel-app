<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Kontak extends Controller
{
    function index() {
        return view('kontak');
    }

    function kirim(Request $request) {
            $nama = $request->nama;
            $email = $request->email;
            $no_hp = $request->no_hp;
            $pesan = $request->pesan;

            $text = "Nama: $nama\nEmail: $email\nNo_hp: $no_hp\nPesan: $pesan";
            $no_tujuan = "6287715752194";
            $url = "https://api.whatsapp.com/send?phone=$no_tujuan&text=" . urlencode($text);

            return redirect()->away($url);
    }
}