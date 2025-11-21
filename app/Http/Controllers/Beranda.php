<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Beranda extends Controller
{
    function index() {
        return view('beranda');
    }
}